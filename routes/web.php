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


// todo 添加《诗经》，分章节展示
Route::get('/poem/{id}', 'PoemController@show');             // page 诗歌页面
Route::get('/poem/{id}/speech', 'PoemController@speech');    // api test
Route::get('/poem/{id}/record', 'PoemController@record');    // api 记录学习诗歌
Route::get('/poem/{id}/seek', 'PoemController@seek');    // api 记录学习诗歌
Route::group(['middleware' => ['auth', 'throttle:60,1']], function () { 
    Route::get('/poem/{id}/mail', 'PoemController@mail');    // api 发送邮件
});

Route::post('test', 'Admin\IndexController@test');
Route::get('bug', function () {
    throw new Exception('Division by zero.');
});

// 上传接口，参数file type
Route::post('upload', 'UploadController@index');

// 图片操作
Route::get('/image', 'ImageController@index');


// 公用的 curd 操作
Route::get('/common/find', 'CurdController@find');
