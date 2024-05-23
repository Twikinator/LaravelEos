<?php

namespace App\Services;

class AuthService
{
    public function __construct()
    {
        //
    }

    public function getGuard() : \Tymon\JWTAuth\JWTGuard
    {
        return auth()->guard('jwt');
    }
}   