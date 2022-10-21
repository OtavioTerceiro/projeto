<?php

use App\Http\Controllers\ProdutosController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/produtos', [ProdutosController::class,'index'])->middleware(['auth'])->name('produtos');

Route::post('/produtos/salvar', [ProdutosController::class,'salvar'])->middleware(['auth'])->name('produtos.salvar');

Route::get('/produtos_listar', function(){
    return view('listar_produto');
})->middleware(['auth'])->name('listar');

Route::get('/dar_baixa_busca', function(){
    return view('dar_baixa_busca');
})->middleware(['auth'])->name('dar_baixa_busca');

Route::get('/dar_baixa', function(){
    return view('dar_baixa');
})->middleware(['auth'])->name('dar_baixa');

Route::get('/cancelar_baixa', function(){
    return view('cancelar_baixa');
})->middleware(['auth'])->name('cancelar_baixa');

Route::get('/lista_cancelar_baixa', function(){
    return view('lista_cancelar_baixa'); //deve estar errado
})->middleware(['auth'])->name('lista_cancelar_baixa');

Route::get('/listar_transacoes', function(){
    return view('listar_transacoes');
})->middleware(['auth'])->name('listar_transacoes');

require __DIR__.'/auth.php';
