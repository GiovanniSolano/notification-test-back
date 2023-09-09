<?php

namespace App\Services;

use App\Repositories\NotificationType\NotificationTypeInterface;

class NotificationService
{
    protected $notificationType;

    public function __construct(NotificationTypeInterface $notificationType)
    {
        $this->notificationType = $notificationType;
    }

    /**
     * send all notifications
     * @param array $notifications
     * @return void
     */

    public function sendNotifications($notifications, $data): void
    {
        foreach ($notifications as $notification) {
            $strategy = $this->notificationType->getStrategyByNotificationType($notification['name']);

            if ($strategy) {

                $dataNotification = [
                    'message' => $data['message'],
                    'user_id' => $notification['pivot']['user_id'],
                    'category_id' => $data['category_id'],
                    'notification_type_id' => $notification['id'],
                ];

                $strategy->sendNotification($dataNotification);
            }
        }

    }

}
