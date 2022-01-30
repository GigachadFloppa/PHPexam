<?php


use Illuminate\Support\Facades\Route;
use \App\Events\EventPublicThing;
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {

        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });




    Route::resource('items', UserThingController::class);
    Route::resource('thing', ThingController::class);
    Route::resource('place', PlaceController::class);


    Route::get('/listen', function(){
        event(new EventPublicThing());
    });

    Route::get('/event', function(){
        return view('listen')   ;
});

});
