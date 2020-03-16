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

 Route::get('/', function () {
     return view('welcome');
 });

/* Route::get('/hello', function () {
    return "Hello";
}); */

/* Route::get('/welcome', function () {
    return view('welcome');
});
 */


Auth::routes();



Route::get('password/change', 'Auth\AuthController@changePassword');
Route::post('password/change', 'Auth\AuthController@postChangePassword');

Route::get('add/user', 'AddUserController@index'); 
Route::post('/add/user', 'AddUserController@add');

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('/dash', function () {
    return view('starter');
});

Route::get('/home', 'HomeController@index')->name('home');
