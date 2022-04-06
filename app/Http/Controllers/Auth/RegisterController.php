<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\Register\Register;
use App\Services\Auth\Register\RegisterFacade;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
       return ( new Register())->register($request->email, $request->name, $request->password);
    }
}
