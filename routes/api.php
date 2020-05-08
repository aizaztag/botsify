<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::middleware('auth:api')->post('/post','PostController@store');
Route::post('/post','PostController@store');


Route::get('/calculate-sum' , 'HomeController@calculate_sum_update_to_users_table');
Route::get('/testQueue', 'HomeController@testQueue');
Route::get('/queue', function (){

    dispatch(function () {
        Artisan::call('queue:work');
    });
});

Route::get('/test', 'HomeController@test');

Route::post('/message', 'ChatController@index');

