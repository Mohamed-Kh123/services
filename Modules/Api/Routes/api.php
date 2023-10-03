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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => [\Modules\Core\Http\Middleware\LanguageMiddleware::class]], function () {

    Route::authApiRoutes();


    Route::get('service', 'ServiceController@index');
    Route::get('category', 'CategoryController@index');


});
