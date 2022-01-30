<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//privat routes
Route::group(['prefix'=>'thing', 'middleware' => 'auth:sanctum'], function(){
    Route::get('create', [ThingController::class, "api_create"]);

});




//public routes
Route::get('/registration', [RegisterController::class, 'api_reg']);
Route::get('/test', function () {
    return response('Test API', 200)
        ->header('Content-Type', 'application/json');
});
Route::get('/login', [LoginController::class, 'api_login'])->name('login');




//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
