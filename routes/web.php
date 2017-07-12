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
/**
 * 指向php界面
 */
Route::get('register', function () {
    return view('user.register', ['name' => 'James']);
});
/*Route::get('loginSuccess/{userName}', function ($userName) {
    return view('user.loginSuccess')->with("userName",$userName);
});*/

/**
 * 指向控制器
 */
Route::post('loginSuccess', "UserController@register");