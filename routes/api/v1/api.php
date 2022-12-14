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

Route::prefix('/user')->group(function(){
    Route::post('/login','LoginCotroller@login');
    Route::group(['middleware'=>['auth:cliente']],function(){// ESTE NOMBRE cliente LO CONFIGURAMOS DE
                                                            // DEL ARCHIVO CONFIG/AUTH.PHP EN guards[] 
        Route::get('/home','LoginCotroller@home');

    });
});