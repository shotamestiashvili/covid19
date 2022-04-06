<?php

namespace App\Services\Auth\Logout;

use App\Interfaces\Auth\LogoutInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    public function logout($request)
    {
        try {
                $request->user()->tokens()->delete();
                Session::flush();
                return Response()->json(['message' => 'successfully logged out']);

        }catch(\Exception $e){
                return Response()->json(['message' => $e]);
        }

    }
}
