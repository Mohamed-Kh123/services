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

Route::prefix('admin')->group(function () {

//    Route::group(['prefix' =>  STORAGE_FILES_PATH_PREFIX],function (){
//        Route::get('/{arg}/{arg1}/{arg2?}/{arg3?}', [\Modules\Core\Http\Controllers\BaseController::class,'exportFile']);
//    });

    Route::any('{any}', 'AdminController@index');
    Route::get('/', 'AdminController@index');
    Route::get('/{id}', 'AdminController@index');
    Route::any('/{all}', 'AdminController@index');
    Route::get('/{resource}/create', 'AdminController@index');
    Route::get('/{resource}/all', 'AdminController@index');
    Route::get('/{resource}/{id}/{all}', 'AdminController@index');
    Route::get('/{resource}/{id}/edit', 'AdminController@index');
    Route::get('/{resource}/{id}/show', 'AdminController@index');
    Route::get('/{resource}/{id}/create', 'AdminController@index');
    Route::get('/{resource}/profile/{id}/{page}', 'AdminController@index');
});
