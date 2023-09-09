<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityLogResource;
use App\Repositories\ActivityLog\ActivityLogInterface;
use App\Utils\CommonUtil;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogController extends Controller
{
    protected $activityLog;
    protected $commonUtl;

    public function __construct(ActivityLogInterface $activityLog, CommonUtil $commonUtl)
    {
        $this->activityLog = $activityLog;
        $this->commonUtl = $commonUtl;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResource | JsonResponse
     */
    public function index(): JsonResource | JsonResponse
    {
        try {

            $categories = $this->activityLog->getAll();

            return ActivityLogResource::collection($categories);

        } catch (Exception $e) {

            $msg = $e->getMessage() ?? __("messages.something_went_wrong");

            return $this->commonUtl->errorResponse($msg, 500);

        }
    }

}
