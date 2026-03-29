<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\RegisterData;
use App\Helpers\ApiResponse;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Services\RegisterService;
use Illuminate\Http\JsonResponse;

class RegisterController
{
    /**
     * Handle the incoming registration request.
     * @param RegisterRequest $register
     * @param RegisterService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterRequest $register, RegisterService $service): JsonResponse
    {
        try {
            $data = RegisterData::make($register);
            $response = $service->register($data);
            return ApiResponse::success(
                data: new AuthResource($response),
                message: 'User registered successfully',
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
