<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['prefix' => 'api'],
//    function () {
//        Route::get('/', function() {
//            return response()->json(['message' => 'Factorys and autos API', 'status' => 'Connected']);
//        });
//
//        Route::resource('makers', \App\Http\Controllers\MakersController::class);
//        Route::resource('autos', \App\Http\Controllers\AutosController::class);
//    }
//);

Route::get('/teste', function () {
    return view('new_index');
});
