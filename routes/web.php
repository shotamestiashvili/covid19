<?php

use App\Gateway\Devtest;
use App\Models\Statistic;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('login', [\App\Http\Controllers\Auth\LoginController::class,  'login']);
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);


Route::get('/country', function () {

    \Illuminate\Support\Facades\Artisan::call('fetch:starter');

});
