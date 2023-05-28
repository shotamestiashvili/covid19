<?php


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
Route::post('logout', [\App\Http\Controllers\Auth\RegisterController::class, 'logout']);

Route::get('/country', function () {

//  \Illuminate\Support\Facades\Artisan::call('fetch:starter');
//    \Illuminate\Support\Facades\Artisan::call('country:populate');

//     Statistic::get()->each(function ($stat){
//         $stat->updated_at ='2022-04-05 04:28:25';
//         $stat->save();
//    });

});
