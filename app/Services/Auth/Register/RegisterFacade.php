<?php

namespace App\Services\Auth\Register;

use App\Interfaces\Auth\RegisterInterface;

class RegisterFacade
{
    public function __construct(RegisterInterface $register, $email, $name, $password)
    {
        $register->register($email, $name, $password);
    }
}
