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

Route::apiResource('pets', 'API\PetController')->except('update');
Route::apiResource('services', 'API\ServiceController')->except(['update', 'store']);
Route::post('services/{pet}', 'API\ServiceController@store')->name('services.store');