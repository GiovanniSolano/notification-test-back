<?php

namespace App\Strategies;

use App\AbstractClasses\BroadcastNewNotification;
use App\Events\NotificationSent;

class EmailNotification extends BroadcastNewNotification
{
    /**
     * Send notification - Email
     * @param array $notificationData
     * @return void
     */
    public function sendNotification($notificationData): void
    {
        //Own logic
        event(new NotificationSent($notificationData));
    }
}
