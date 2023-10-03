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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => \Modules\Core\Http\Middleware\LanguageMiddleware::class], function () {

    Route::authApiRoutes();
    Route::resourceRoutes('category', 'CategoryController');
    Route::resourceRoutes('service', 'ServiceController');
    Route::resourceRoutes('company', 'CompanyController');
    Route::resourceRoutes('employee', 'EmployeeController');
    Route::resourceRoutes('select-group', 'SelectGroupController');
    Route::resourceRoutes('customer', 'CustomerController');
    Route::get('constant', 'ConstantController@index');

});
