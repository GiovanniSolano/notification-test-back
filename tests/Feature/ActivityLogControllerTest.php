<?php

use App\Models\ActivityLog;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh');
    $this->seed(DatabaseSeeder::class);
});

describe('ActivityLogController Testing', function() {

    it('Activity Logs were created by seeder', function() {

        $activityLogs = ActivityLog::count();

        expect($activityLogs)->toBe(15);

    });

    it('Get Activity Logs', function() {

        $this->getJson('/api/v1/activity-logs')->assertOk();

    });

    it('Get Activity Logs Paginated', function() {

        $this->getJson('/api/v1/activity-logs')
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'message', 'category' , 'user', 'notification_type', 'created_at'],
            ],
            'links',
            'meta',
        ])
        ->assertJsonCount(15, 'data');

    });

});
