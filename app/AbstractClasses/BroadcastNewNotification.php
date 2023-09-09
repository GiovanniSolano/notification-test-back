<?php

namespace App\AbstractClasses;

abstract class BroadcastNewNotification
{
    /**
     * Send Notification parent.
     * @param array $notificationData
     * @return void
     */
    abstract protected function sendNotification($notificationData): void;
}
