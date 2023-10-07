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

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => [\Modules\Core\Http\Middleware\LanguageMiddleware::class]], function () {

    Route::authApiRoutes();

    Route::get('splash', 'MainController@index');

    Route::prefix('service')->controller('ServiceController')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
    });

    Route::prefix('category')->controller('CategoryController')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
    });

    Route::prefix('order')->controller('OrderController')->group(function () {
        Route::post('/', 'store');
    });

});
