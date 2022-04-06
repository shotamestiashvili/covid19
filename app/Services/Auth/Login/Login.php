<?php

namespace App\Services\Auth\Login;

use App\Interfaces\Auth\LoginInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Login implements LoginInterface
{

    public function login($email, $password)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                $token = $user->createToken('covid19')->plainTextToken;
                $response = ['token' => $token];

                return response($response, 200);
            } else {

                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
                $response = ["message" =>'User does not exist'];
                return response($response, 422);
        }
    }
}
