<?php

namespace App\Utils;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\JsonResponse;

class CommonUtil
{
    /**
     * Send success response
     * @param array $data
     * @return SuccessResource
     */
    public function successResponse($data): SuccessResource
    {
        return new SuccessResource($data);
    }

    /**
     * Send error response
     * @param string $message
     * @param integer $statusCode
     * @return JsonResponse
     */
    public function errorResponse($message, $statusCode): JsonResponse
    {
        $resource = new ErrorResource([ 'status' => $statusCode, 'message' => $message ]);

        return $resource->response()->setStatusCode($statusCode);

    }

}
