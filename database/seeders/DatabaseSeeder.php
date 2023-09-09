<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(NotificationTypeSeeder::class);

        User::factory(10)->create();

        $users = User::all();
        $categories = Category::all();
        $notificationTypes = NotificationType::all();

        foreach ($users as $user) {
            $user->categories()->attach($categories->random(rand(1, 3))->pluck('id'));
            $user->notificationTypes()->attach($notificationTypes->random(rand(1, 3))->pluck('id'));
        }

        ActivityLog::factory(15)->create();

    }
}
