<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\LoginData;
use App\Helpers\ApiResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\LoginService;
use Illuminate\Http\JsonResponse;

class LoginController
{
    /**
     * Handle the incoming login request.
     * @param LoginRequest $request
     * @param LoginService $service
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request, LoginService $service): JsonResponse
    {
        try {
            $data = LoginData::make($request);
            $response = $service->login($data);
            return ApiResponse::success(
                data: new AuthResource($response),
                message: 'User login successfully',
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
