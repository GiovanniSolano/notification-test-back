<?php

use App\Events\NotificationSent;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();
    $this->artisan('migrate:fresh');
    $this->seed(DatabaseSeeder::class);
    Event::assertNotDispatched(DatabaseSeeder::class);
});

describe('NotificationController Testing', function() {

    it('Validates that the "message" property is present', function () {

        $requestData = [
            'category_id' => Category::first()->id,
        ];

        $response = $this->postJson('/api/v1/notifications/send', $requestData);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['message']);

    });

    it('Validates that the "category_id" property exists', function () {

        $requestData = [
            'message' => 'Hello World',
            'category_id' => 0
        ];

        $response = $this->postJson('/api/v1/notifications/send', $requestData);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['category_id']);

    });

    it('Validates that the event is dispatched', function () {

        $user = User::first();

        $testData = [
            'message' => 'Hello World',
            'user_id' => $user->id,
            'category_id' => $user->categories()->first()->id,
            'notification_type_id' => $user->notificationTypes()->first()->id
        ];

        event(new NotificationSent($testData));

        Event::assertDispatched(NotificationSent::class, function ($event) use ($testData) {
            return $event->notificationData === $testData;
        });
    });


});
