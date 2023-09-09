<?php

namespace App\Strategies;

use App\AbstractClasses\BroadcastNewNotification;
use App\Events\NotificationSent;

class SMSNotification extends BroadcastNewNotification
{
    /**
     * Send notification - SMS
     * @param array $notificationData
     * @return void
     */
    public function sendNotification($notificationData): void
    {
        //Own logic
        event(new NotificationSent($notificationData));
    }
}
