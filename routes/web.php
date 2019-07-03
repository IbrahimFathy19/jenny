<?php

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

Auth::routes();

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/services', 'PageController@services');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');
Route::get('/profile', 'ProfileController@index');
Route::get('/sessions', 'ProfileController@getSessions')->name('sessions');
Route::get('/interests', 'ProfileController@getInterests')->name('interests');


Route::get('/assistant-settings', 'Settings@get_assistant_settings')->name('assistant-settings');

Route::get('/profile-settings', 'Settings@get_profile_settings')->name('profile-settings');

Route::post('/assistant-settings/save/{user_profile_id}', 'Settings@update_assistant_settings')->name('assistant.settings.update');

Route::post('/profile-settings/save/{user_profile_id}', 'Settings@update_profile_settings')->name('profile.settings.update');