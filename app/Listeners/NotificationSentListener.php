<?php

namespace App\Listeners;

use App\Repositories\ActivityLog\ActivityLogInterface;

class NotificationSentListener
{
    protected $activityLog;

    /**
     * Create the event listener.
     */
    public function __construct(ActivityLogInterface $activityLog)
    {
        $this->activityLog = $activityLog;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $this->activityLog->create($event->notificationData);
    }
}
