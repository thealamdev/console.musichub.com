<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Get all categories
     * @param CategoryService $service
     * @return JsonResponse
     */
    public function index(CategoryService $service): JsonResponse
    {
        $resource = $service->getAll();
        $response = CategoryResource::collection($resource);
        return ApiResponse::success($response, 'Category retrieved successfully');
    }

    
    public function store()
    {
        dd('Hi');
    }
}
