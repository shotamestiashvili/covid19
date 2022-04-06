<?php

namespace App\Interfaces\Auth;

use App\Services\Auth\Register\Register;
use Illuminate\Http\Response;

interface RegisterInterface
{
    public function register(string $email, string $name, string $password);
}
