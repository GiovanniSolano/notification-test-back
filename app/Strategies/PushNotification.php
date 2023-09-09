<?php

namespace App\Strategies;

use App\AbstractClasses\BroadcastNewNotification;
use App\Events\NotificationSent;

class PushNotification extends BroadcastNewNotification
{
    /**
     * Send notification - Push Notification
     * @param array $notificationData
     * @return void
     */
    public function sendNotification($notificationData): void
    {
        //Own logic
        event(new NotificationSent($notificationData));
    }
}
