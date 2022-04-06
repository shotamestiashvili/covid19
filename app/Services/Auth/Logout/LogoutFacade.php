<?php

namespace App\Services\Auth\Logout;

use App\Interfaces\Auth\LogoutInterface;

class LogoutFacade
{
    public function __construct(LogoutInterface $logout)
    {
        return $logout->logout();
    }
}
