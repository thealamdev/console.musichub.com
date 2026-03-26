<?php

namespace App\Http\Controllers;

use App\DTOs\Category\StoreCategoryData;
use App\DTOs\Category\UpdateCategoryData;
use App\Helpers\ApiResponse;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    /**
     * Get all categories
     * @param CategoryService $service
     * @return JsonResponse
     */
    public function index(CategoryService $service): JsonResponse
    {
        try {
            $data = $service->getAll();
            return ApiResponse::success(
                data: CategoryResource::collection(resource: $data),
                message: 'Category retrieved successfully'
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                code: $e->getCode(),
                errors: $e
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @param CategoryService $service
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request, CategoryService $service): JsonResponse
    {
        try {
            $data = StoreCategoryData::make($request);
            $category = $service->store($data);

            return ApiResponse::success(
                data: new CategoryResource($category),
                message: 'Category created successfully',
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                errors: $e
            );
        }
    }

    /**
     * Update the specified resource in storage. 
     * @param UpdateCategoryRequest $request
     * @param CategoryService $service
     * @param Category $category
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, CategoryService $service, Category $category)
    {
        try {
            $data = UpdateCategoryData::make($request);
            $response = $service->update($data, $category);
            return ApiResponse::success(
                data: new CategoryResource($response),
                message: 'Category Update successfully'
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                errors: $e
            );
        }
    }
}
