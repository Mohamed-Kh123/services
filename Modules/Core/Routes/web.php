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

use Illuminate\Support\Facades\Route;

Route::prefix('core')->group(function () {
    Route::get('/', 'CoreController@index');
});

Route::group(['prefix' => STORAGE_FILES_PATH_PREFIX],function (){
    Route::get('/preview/{arg}/{arg1}/{arg2?}/{arg3?}', 'BaseController@previewFile');
    Route::get('/{arg}/{arg1}/{arg2?}/{arg3?}', 'BaseController@exportFile');
});


Route::prefix('/image')->group(function () {
    Route::get('/{size}/{id}', ['as' => 'image', 'uses' => 'ImageController@getPublicImage']);
    Route::get('/{id}', ['as' => 'image_get', 'uses' => 'ImageController@getDefaultImage']);
//  Route::get('/limit/{size}/{id}', ['as' => 'image', 'uses' => 'ImageController@getImageResize']);
    Route::post('/upload', ['as' => 'upload', 'uses' => 'ImageController@upload']);
});

