<?php

namespace App\Services\Auth\Register;

use App\Interfaces\Auth\RegisterInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register implements RegisterInterface
{
    public function register($email, $name, $password)
    {
        $remember_token = Str::random(10);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'password_confirmation'=> Hash::make($password),
            'remember_token' => $remember_token,
        ]);

        $token = $user->createToken('covid19')->plainTextToken;

        return Response()->json(['token' => $token]);
    }
}
