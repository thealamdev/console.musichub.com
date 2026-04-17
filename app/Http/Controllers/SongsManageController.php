<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Resources\SongResource;
use App\Services\SongsManageService;
use Illuminate\Http\JsonResponse;

class SongsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @SongService $service
     */
    public function index(SongsManageService $service): JsonResponse
    {
        try {
            $data = $service->getAll();
            return ApiResponse::success(
                data: SongResource::collection(resource: $data),
                message: 'Songs retrieved successfully'
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                message: $e->getMessage(),
                code: $e->getCode(),
                errors: $e
            );
        }
    }
}
