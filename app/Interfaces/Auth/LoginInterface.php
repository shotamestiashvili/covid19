<?php

namespace App\Interfaces\Auth;

interface LoginInterface
{
    public function login(string $email, string $password);
}
