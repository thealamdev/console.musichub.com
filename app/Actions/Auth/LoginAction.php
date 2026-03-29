<?php

namespace App\Actions\Auth;

use App\DTOs\Auth\LoginData;
use App\Repository\LoginRepository;

class LoginAction{
    public function __construct(
        protected LoginRepository $repo
    ) {}

    /**
     * Execute the login action.
     * @param LoginData $data
     */
    public function execute(LoginData $data)
    {
        return $this->repo->login($data);
    }
}