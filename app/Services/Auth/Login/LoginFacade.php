<?php

namespace App\Services\Auth\Login;

use App\Interfaces\Auth\LoginInterface;

class LoginFacade
{
    public function __construct(LoginInterface $login, $email, $password)
    {
        return $login->login( $email, $password);
    }
}
