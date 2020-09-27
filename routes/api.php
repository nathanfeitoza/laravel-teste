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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'prefix' => 'auto_api',
        'middleware' => ['client_credentials']
    ],
    function () {

    Route::apiResource('makers', \App\Http\Controllers\MakersController::class);

    Route::get('maker/{id}/autos', [\App\Http\Controllers\MakersController::class, 'autosOfMaker']);

    Route::resource('autos', \App\Http\Controllers\AutosController::class);
});

