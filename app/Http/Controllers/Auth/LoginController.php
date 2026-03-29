<?php

namespace App\Http\Controllers\Auth;

class LoginController
{
    public function __invoke()
    {
        return response()->json([
            'message' => 'Login successful',
        ]);
    }
}
