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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('social-login', 'API\UserController@social_login');
Route::post('social-register', 'API\UserController@social_register');

Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){

    Route::post('profile', 'API\UserController@profile');
    Route::post('account', 'API\UserController@account');    
    Route::post('assistant-settings', 'API\UserController@assistant_settings');
    Route::post('user', 'API\UserController@user');

    
});
