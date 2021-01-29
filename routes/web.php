<?php

use App\Http\Controllers\Admin\UserController; 
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\Admin\InputController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SaleProductController;
 
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
//------------------------- Sale -------------------------------
//criar 
Route::get('venda/create',[SaleController::class, 'create']);
Route::post('venda/create',[SaleController::class, 'update'])->name('add_produto');
//mostrar
Route::get('/venda/ver/{id}', [SaleController::class, 'show']);  
//edit
Route::get('/venda/editar/{id}',[SaleController::class, 'edit']);
Route::post('/venda/editar/{id}',[SaleController::class, 'update'])->name('alterar_produto');
//deletar
Route::get('/venda/excluir/{id}',[SaleController::class, 'deletar']);
Route::post('/venda/excluir/{id}',[SaleController::class, 'destroy'])->name('excluir_produto');
//lista
Route::get('/venda/lista',[SaleController::class,'list']); 
Route::get('/venda/listaAll',[SaleController::class,'list']); 

//------------------------- SaleProduct-------------------------------
//criar
Route::get('Venda_dos_Produtos/create',[SaleProductController::class,'create']);  
Route::post('Venda_dos_Produtos/create',[SaleProductController::class, 'update'])->name('add_produto');
//mostrar
Route::get('/Venda_dos_Produtos/ver/{id}', [SaleProductController::class, 'show']); 
//edit
Route::get('/Venda_dos_Produtos/editar/{id}',[SaleProductController::class, 'edit']);
Route::post('/Venda_dos_Produtos/editar/{id}',[SaleProductController::class, 'update'])->name('alterar_produto');
//deletar
Route::get('/Venda_dos_Produtos/excluir/{id}',[SaleProductController::class, 'deletar']);
Route::post('/Venda_dos_Produtos/excluir/{id}',[SaleProductController::class, 'destroy'])->name('excluir_produto');
//lista
Route::get('/Venda_dos_Produtos/lista',[SaleProductController::class,'list']); 