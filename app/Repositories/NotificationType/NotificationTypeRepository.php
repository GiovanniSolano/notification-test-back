<?php

namespace App\Repositories\NotificationType;

use App\Models\NotificationType;
use Illuminate\Support\Collection;

class NotificationTypeRepository implements NotificationTypeInterface {

    /**
     * Get all categories
     * @param array $columns
     * @return Collection
     */
    public function getAll($columns = []): Collection
    {
        $notificationTypes = NotificationType::all();

        if(!empty($columns)) {
            $notificationTypes = $notificationTypes->pluck($columns);
        }

        return $notificationTypes;
    }

    /**
     * Get strategy by notification type
     * @param string $notificationType
     * @return mixed
     */

    public function getStrategyByNotificationType($notificationType): mixed
    {
        if(array_key_exists($notificationType, NotificationType::NOTIFICATION_TYPE_CLASS)) {
            $notificationTypeClass = NotificationType::NOTIFICATION_TYPE_CLASS[$notificationType];
            return new $notificationTypeClass;
        }

        return null;

    }

    // .... additional methods

}
