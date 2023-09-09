<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendNotificationRequest;
use App\Http\Resources\SuccessResource;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\NotificationType\NotificationTypeInterface;
use App\Services\NotificationService;
use App\Strategies\EmailNotification;
use App\Utils\CommonUtil;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    protected $commonUtil;
    protected $category;
    protected $notificationService;

    public function __construct(CategoryInterface $category, CommonUtil $commonUtil, NotificationService $notificationService)
    {
        $this->commonUtil = $commonUtil;
        $this->notificationService = $notificationService;
        $this->category = $category;
    }

    /**
     * Sent notification to users.
     *
     * @param SendNotificationRequest $request
     * @return JsonResponse | SuccessResource
     */

    public function sendNotification(SendNotificationRequest $request): JsonResponse | SuccessResource
    {
        try {

            DB::beginTransaction();

            $data = $request->validated();
            $notifications = [];

            $users = $this->category->getUsersByCategory($data['category_id']);

            foreach ($users as $user) {
                array_push($notifications, $user->notificationTypes->toArray());
            }

            $notifications = array_reduce($notifications, 'array_merge', []);

            $this->notificationService->sendNotifications($notifications, $data);

            DB::commit();

            return $this->commonUtil->successResponse(['message' => 'All notifications were sent']);

        } catch (Exception $e) {

            DB::rollBack();

            $msg = $e->getMessage() ?? __("Something Went Wrong");

            return $this->commonUtil->errorResponse($msg, 500);
        }

    }
}
