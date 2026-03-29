<?php


namespace App\Actions\Auth;

use App\DTOs\Auth\RegisterData;
use App\Repository\RegisterRepository;

class RegisterAction
{
    public function __construct(
        protected RegisterRepository $repo,
    ) {}

    /**
     * Execute the registration action.
     * @param RegisterData $data
     * @return array{token: string, user: \App\Models\User}
     */
    public function execute(RegisterData $data): array
    {
        $user = $this->repo->register($data);
        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
