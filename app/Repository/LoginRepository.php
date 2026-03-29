<?php

namespace App\Repository;

use App\Models\User;
use App\DTOs\Auth\LoginData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginRepository
{
    /**
     * Handle the login logic.
     * @param LoginData $data
     * @return array{token: string, user: User|\stdClass}
     */
    public function login(LoginData $data): array
    {
        $user = User::where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
