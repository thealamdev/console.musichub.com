<?php

namespace App\Repository;

use App\DTOs\Auth\RegisterData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    /**
     * Register a new user in the database.
     * @param RegisterData $data
     * @return User
     */
    public function register(RegisterData $data): User
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }
}
