<?php

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

Route::middleware(['auth:api'])->group(function (){
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');

    Route::apiResource('books', 'BookController');
    Route::post('books/{book}/ratings', 'RatingController@store');
});

Route::namespace('Auth')->group(function (){

    Route::prefix('user')->group(function (){

        Route::post('register', 'AuthController@register');
        Route::get('verify/{verification_code}', 'AuthController@verify');

        Route::post('login', 'AuthController@login')->name('login');
        Route::post('me', 'AuthController@me');

        Route::post('password/recover', 'PasswordController@recover');
        Route::get('password/reset/{token}', 'PasswordController@resetForm')->name('password.reset.form');
        Route::post('password/reset', 'PasswordController@reset')->name('password.reset');
    });
});

