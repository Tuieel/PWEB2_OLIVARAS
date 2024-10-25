<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::post('/produto/search', [ProdutoController::class, "search"])->name('produto.search');
Route::post('/funcionario/search', [FuncionarioController::class, "search"])->name('funcionario.search');
Route::post('/fornecedor/search', [FornecedorController::class, "search"])->name('fornecedor.search');

Route::resource('produto', ProdutoController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::resource('fornecedor', FornecedorController::class);
