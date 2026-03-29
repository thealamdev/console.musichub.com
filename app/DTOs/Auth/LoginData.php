<?php

namespace App\DTOs\Auth;

use App\Http\Requests\LoginRequest;

class LoginData
{
    public function __construct(
        public readonly string $email = '',
        public readonly string $password = '',
    ) {}

    /**
     * Define the request DTO.
     * @param LoginRequest $request
     * @return LoginData
     */
    public static function make(LoginRequest $request)
    {
        return new self(
            email: $request->input('email'),
            password: $request->input('password'),
        );
    }
}
