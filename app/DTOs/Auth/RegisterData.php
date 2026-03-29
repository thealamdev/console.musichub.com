<?php

namespace App\DTOs\Auth;

use App\Http\Requests\RegisterRequest;

class RegisterData
{
    public function __construct(
        public readonly string $name = '',
        public readonly string $email = '',
        public readonly string $password = '',
    ) {}

    /**
     * Define the request DTO.
     * @param RegisterRequest $request
     * @return RegisterData
     */
    public static function make(RegisterRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            email: $request->input('email'),
            password: $request->input('password'),
        );
    }
}
