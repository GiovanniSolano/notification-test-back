<?php

namespace Database\Seeders;

use App\Enums\NotificationTypeEnum;
use App\Models\NotificationType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NotificationType::insert([
            [ "name" => NotificationTypeEnum::SMS, "created_at" => Carbon::now(), "updated_at" => Carbon::now()  ],
            [ "name" => NotificationTypeEnum::Email, "created_at" => Carbon::now(), "updated_at" => Carbon::now() ],
            [ "name" => NotificationTypeEnum::PushNotification, "created_at" => Carbon::now(), "updated_at" => Carbon::now() ]
        ]);
    }
}
