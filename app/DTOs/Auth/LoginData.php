<?php

namespace App\DTOs\Auth;

use App\Http\Requests\LoginRequest;

class LoginData
{
    public function __construct(
        protected string $email = '',
        protected string $password = '',
    ) {}

    public static function make(LoginRequest $request) {}
}
