<?php

use App\Http\Controllers\Admin\UserController; 
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\Admin\InputController;
use App\Http\Controllers\Admin\ProductController;

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
Route::post('users/create', [UserController::class, 'store'])->name('registrar_produto');
Route::get('users/create', [UserController::class, 'create']);
//mostrar
Route::get('/users/ver/{id}', [UserController::class, 'show']); 
//edit
Route::get('/users/editar/{id}',[UserController::class, 'edit']);
Route::post('/users/editar/{id}',[UserController::class, 'update'])->name('alterar_user');
//deletar
Route::get('/users/excluir/{id}',[UserController::class, 'deletar']);
Route::post('/users/excluir/{id}',[UserController::class, 'destroy'])->name('excluir_user');
//lista
Route::get('/users/list',[UserController::class,'list']); 

//------------------------- PRODUTOS -------------------------------
//criar
Route::get('produtos/create',[ProductController::class,'create']);  
Route::post('produtos/create',[ProductController::class, 'update'])->name('add_produto');
//mostrar
Route::get('/produtos/ver/{id}', [ProductController::class, 'show']); 
//edit
Route::get('/produtos/editar/{id}',[ProductController::class, 'edit']);
Route::post('/produtos/editar/{id}',[ProductController::class, 'update'])->name('alterar_produto');
//deletar
Route::get('/produtos/excluir/{id}',[ProductController::class, 'deletar']);
Route::post('/produtos/excluir/{id}',[ProductController::class, 'destroy'])->name('excluir_produto');
//lista
Route::get('/produtos/lista',[ProductController::class,'list']); 
//------------------------- INPUTS -------------------------------
//criar
Route::get('inputs/create',[InputController::class,'create']);  
Route::post('inputs/create',[InputController::class, 'update'])->name('add_produto');
//mostrar
Route::get('/inputs/ver/{id}', [InputController::class, 'show']); 
//edit
Route::get('/inputs/editar/{id}',[InputController::class, 'edit']);
Route::post('/inputs/editar/{id}',[InputController::class, 'update'])->name('alterar_produto');
//deletar
Route::get('/inputs/excluir/{id}',[InputController::class, 'deletar']);
Route::post('/inputs/excluir/{id}',[InputController::class, 'destroy'])->name('excluir_produto');
//lista
Route::get('/inputs/lista',[InputController::class,'list']); 
