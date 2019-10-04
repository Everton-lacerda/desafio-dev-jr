<?php

use Illuminate\Http\Request;

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
// Route::post('auth/login', 'Api\AuthController@authenticate');

Route::prefix('')->namespace('API')->name('api.')->group(function () {
    Route::prefix('users')->group( function () {

        Route::get('/', 'UsersController@index');
        Route::get('/{id}', 'UsersController@show');

        Route::post('/', 'UsersController@store');

        Route::put('/{id}', 'UsersController@update');

        Route::delete('/{id}', 'UsersController@delete');
    });
    Route::prefix('auth')->group(function () {

        Route::post('/login', 'AuthController@authenticate')->name('authenticate_user');

        Route::middleware('jwt.auth')->post('/logout', 'AuthController@logout')->name('logout_user');

        Route::post('/refresh', 'AuthController@refresh')->name('refresh_user');

        Route::middleware('jwt.auth')->post('/getAuth', 'AuthController@getAuthenticatedUser')->name('getAuth_user');
    });
});
