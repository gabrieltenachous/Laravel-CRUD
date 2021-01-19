<?php

use App\Http\Controllers\Admin\UsersController;
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


//Route::get('users/show/{id}', [UsersController::class, 'list']);
//Route::put('users/viewEdit', [UsersController::class, 'edit']);

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
//Route::post('/users/list{id}',[UsersController::class,'list']->name('lista_user'));