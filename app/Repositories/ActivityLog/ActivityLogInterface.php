<?php

namespace App\Repositories\ActivityLog;

use App\Models\ActivityLog;
use Illuminate\Pagination\LengthAwarePaginator;

interface ActivityLogInterface {

    /**
     * Get all Activity Logs
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * Create an Activity Log
     * @param array $activityLogData
     * @return ActivityLog
     */
    public function create($activityLogData): ActivityLog;

}
