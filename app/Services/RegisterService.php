<?php

namespace App\Services;

use App\Actions\Auth\RegisterAction;
use App\DTOs\Auth\RegisterData;

class RegisterService
{
    public function __construct(
        protected RegisterAction $register
    ){}

    /**
     * Execute the registration service.
     * @param RegisterData $data
     * @return array{token: string, user: \App\Models\User}
     */
    public function register(RegisterData $data):array
    {
        return $this->register->execute($data);
    }
}
