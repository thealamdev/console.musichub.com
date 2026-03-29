<?php

namespace  App\Services;

use App\Actions\Auth\LoginAction;
use App\DTOs\Auth\LoginData;

class LoginService
{
    public function __construct(
        protected LoginAction $loginAction
    ) {}

    /**
     * Execute the login service.
     * @param LoginData $data
     */
    public function login(LoginData $data)
    {
        return $this->loginAction->execute($data);
    }
}
