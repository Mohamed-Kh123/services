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

//\Illuminate\Support\Facades\Route::middleware('auth:api')->get('/admin', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth:' . ADMIN_GUARD,'prefix' => 'admin'], function () {
    Route::authApiRoutes();
});
