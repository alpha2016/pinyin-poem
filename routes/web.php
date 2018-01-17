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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/read', 'ReadController@index');
Route::get('/demo', 'ReadController@demo');
Route::get('/rand', 'TestController@rand');                // random_int 函数生成位图
Route::get('/reverse', 'TestController@reverse');          // 反转字符串，同位置的字母保持大小写一致
Route::get('/word-check', 'TestController@wordCheck');     // 敏感词过滤

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin 相关的登录
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::post('/logout', 'Admin\Auth\LoginController@logout');
});

// todo 添加《诗经》，分章节展示
Route::get('/poem/{id}', 'PoemController@show');
Route::get('/poem/{id}/speech', 'PoemController@speech');
Route::group(['middleware' => ['auth', 'throttle:60,1']], function () { 
    Route::get('/poem/{id}/mail', 'PoemController@mail');
});

Route::post('test', 'Admin\IndexController@test');
Route::get('bug', function () {
    throw new Exception('Division by zero.');
});
