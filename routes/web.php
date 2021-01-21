<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\Admin\InputsController;
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

 
//---------------------------- USUARIO  -----------------------------
//criar
Route::post('users/create', [UsersController::class, 'store'])->name('registrar_produto');
Route::get('users/create', [UsersController::class, 'create']);
//mostrar
Route::get('/users/ver/{id}', [UsersController::class, 'show']); 
//edit
Route::get('/users/editar/{id}',[UsersController::class, 'edit']);
Route::post('/users/editar/{id}',[UsersController::class, 'update'])->name('alterar_user');
//deletar
Route::get('/users/excluir/{id}',[UsersController::class, 'deletar']);
Route::post('/users/excluir/{id}',[UsersController::class, 'destroy'])->name('excluir_user');
//lista
Route::get('/users/list',[UsersController::class,'list']); 

//------------------------- PRODUTOS -------------------------------
//criar
Route::get('produto/create',[ProductsController::class,'create']);  
Route::post('produto/create',[ProductsController::class, 'update'])->name('add_produto');
//mostrar
Route::get('/produto/ver/{id}', [ProductsController::class, 'show']); 
//edit
Route::get('/produto/editar/{id}',[ProductsController::class, 'edit']);
Route::post('/produto/editar/{id}',[ProductsController::class, 'update'])->name('alterar_produto');
//deletar
Route::get('/produto/excluir/{id}',[ProductsController::class, 'deletar']);
Route::post('/produto/excluir/{id}',[ProductsController::class, 'destroy'])->name('excluir_produto');
//lista
Route::get('/produtos/lista',[ProductsController::class,'list']); 
//------------------------- INPUTS -------------------------------
//criar
Route::get('inputs/create',[InputsController::class,'create']);  
Route::post('inputs/create',[InputsController::class, 'update'])->name('add_produto');
//mostrar
Route::get('/inputs/ver/{id}', [InputsController::class, 'show']); 
//edit
Route::get('/inputs/editar/{id}',[InputsController::class, 'edit']);
Route::post('/inputs/editar/{id}',[InputsController::class, 'update'])->name('alterar_produto');
//deletar
Route::get('/inputs/excluir/{id}',[InputsController::class, 'deletar']);
Route::post('/inputs/excluir/{id}',[InputsController::class, 'destroy'])->name('excluir_produto');
//lista
Route::get('/inputs/lista',[InputsController::class,'list']); 
