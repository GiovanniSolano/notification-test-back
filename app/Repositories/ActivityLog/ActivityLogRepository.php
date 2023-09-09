<?php

namespace App\Repositories\ActivityLog;

use App\Models\ActivityLog;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityLogRepository implements ActivityLogInterface {

    /**
     * Get all Activity Logs
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return ActivityLog::with(['user:name,id', 'category:name,id', 'notificationType:name,id'])->latest()->paginate();
    }

    /**
     * Create an activity log
     * @param array $activityLogData
     * @return ActivityLog
     */
    public function create($activityLogData): ActivityLog
    {
        return ActivityLog::create($activityLogData);
    }

    // .... additional methods

}
