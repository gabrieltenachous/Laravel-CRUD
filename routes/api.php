<?php

use App\Http\Controllers\Api\InputController;
use App\Http\Controllers\Api\ProductController; 
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//users
Route::get('/users/{id}', [UserController::class, 'get']);
Route::get('/users', [UserController::class, 'getAll']);
Route::post('/users', [UserController::class, 'post']);
Route::put('/users/{id}', [UserController::class, 'put']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
//produtos
Route::get('/products/{id}', [ProductController::class, 'get']);
Route::get('/products', [ProductController::class, 'getAll']);
Route::post('/products', [ProductController::class, 'post']);
Route::put('/products/{id}', [ProductController::class, 'put']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
//entradas
Route::get('/inputs/{id}', [InputController::class, 'get']);
Route::get('/inputs', [InputController::class, 'getAll']);
Route::post('/inputs', [InputController::class, 'post']);
Route::put('/inputs/{id}', [InputController::class, 'put']);
Route::delete('/inputs/{id}', [InputController::class, 'delete']);