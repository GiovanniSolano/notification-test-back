<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Repositories\Category\CategoryInterface;
use App\Utils\CommonUtil;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    protected $category;
    protected $commonUtl;

    public function __construct(CategoryInterface $category, CommonUtil $commonUtl)
    {
        $this->category = $category;
        $this->commonUtl = $commonUtl;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResource | JsonResponse
     */
    public function index(): JsonResource | JsonResponse
    {
        try {

            $categories = $this->category->getAll();

            return CategoryResource::collection($categories);

        } catch (Exception $e) {

            $msg = $e->getMessage() ?? __("Something Went Wrong");

            return $this->commonUtl->errorResponse($msg, 500);

        }
    }
}
