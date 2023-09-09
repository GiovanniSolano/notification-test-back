<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NotificationSent
{
    use SerializesModels;

    public $notificationData;

    /**
     * Create a new event instance.
     */
    public function __construct($notificationData)
    {
        $this->notificationData = $notificationData;
    }
}
