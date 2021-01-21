<?php

use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\InputsController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//users
Route::get('/users/{id}', [UsersController::class, 'get']);
Route::get('/users', [UsersController::class, 'getAll']);
Route::post('/users', [UsersController::class, 'post']);
Route::put('/users/{id}', [UsersController::class, 'put']);
Route::delete('/users/{id}', [UsersController::class, 'delete']);
//produtos
Route::get('/products/{id}', [ProductsController::class, 'get']);
Route::get('/products', [ProductsController::class, 'getAll']);
Route::post('/products', [ProductsController::class, 'post']);
Route::put('/products/{id}', [ProductsController::class, 'put']);
Route::delete('/products/{id}', [ProductsController::class, 'delete']);
//entradas
Route::get('/inputs/{id}', [InputsController::class, 'get']);
Route::get('/inputs', [InputsController::class, 'getAll']);
Route::post('/inputs', [InputsController::class, 'post']);
Route::put('/inputs/{id}', [InputsController::class, 'put']);
Route::delete('/inputs/{id}', [InputsController::class, 'delete']);