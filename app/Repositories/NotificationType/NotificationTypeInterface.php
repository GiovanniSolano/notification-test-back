<?php

namespace App\Repositories\NotificationType;

use Illuminate\Support\Collection;

interface NotificationTypeInterface {

    /**
     * Get all notification types
     * @param array $columns
     * @return Collection
     */
    public function getAll($columns = []): Collection;

    /**
     * Get notification type class
     * @param string $notificationType
     * @return mixed
     */
    public function getStrategyByNotificationType($notificationType): mixed;
}
