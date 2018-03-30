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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', 'Admin\IndexController@index');

    // 类型相关
    Route::get('poem-types', 'Admin\Poem\PoemTypeController@index');
    Route::post('poem-types', 'Admin\Poem\PoemTypeController@create');
    Route::put('poem-types/{id}', 'Admin\Poem\PoemTypeController@modify');
    Route::delete('poem-types/{id}', 'Admin\Poem\PoemTypeController@delete');

    
    // 诗歌相关
    Route::get('poems', 'Admin\Poem\PoemController@index');
    Route::get('poem/create', 'Admin\Poem\PoemController@showCreate');
    Route::post('poem', 'Admin\Poem\PoemController@create');
});
