<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    // Route::group(['middleware'=>'jwt.auth','prefix'=>'fruits', 'namespace'=>'Fruit'],function(){
    //     Route::get('/','IndexController');
    // });
});
Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function () {
    // Route::get('/','IndexController');
    Route::group(['namespace' => 'App\Http\Controllers\User', 'prefix' => 'users'], function () {

        Route::post('register', 'StoreController');
        Route::get('me', "IndexController");
    });
    Route::group(['namespace' => 'App\Http\Controllers\Dream', 'prefix' => 'dreams'], function () {
        Route::post('/', 'StoreController');
        Route::post('/update', 'UpdateController');
        Route::post('/delete', 'DeleteController');
        Route::post('/finish', 'DeleteController');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Cite', 'prefix' => 'cite'], function () {
        Route::get('/', 'IndexController');
        Route::post('/create', 'StoreController');
        Route::post('/update/{cite}', 'UpdateController');
        Route::post('/delete/{cite}', 'DeleteController');
    });
    Route::group(['namespace' => 'App\Http\Controllers\Daily', 'prefix' => 'daily'], function () {
        Route::post('/', 'StoreController');
    });
});
