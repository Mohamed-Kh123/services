<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/core', function (Request $request) {
//    return $request->user();
//});
//\Illuminate\Support\Facades\Route::group(['prefix' => 'image'], function () {
//  \Illuminate\Support\Facades\Route::post('/upload', 'ImageController@upload');
//});
Route::group(['prefix' => STORAGE_FILES_PATH_PREFIX], function () {
    Route::get('/preview/{arg}/{arg1}/{arg2?}/{arg3?}', 'BaseController@previewFileApi');
});

