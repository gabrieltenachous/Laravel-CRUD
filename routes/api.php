<?php

use App\Http\Controllers\Api\UsersController;
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

Route::get('/users/{id}',[UsersController::class,'get']);
Route::get('/users',[UsersController::class,'getAll']);
Route::post('/users',[UsersController::class,'post']);
Route::put('/users/{id}',[UsersController::class,'put']);
Route::delete('/users/{id}',[UsersController::class,'delete']);