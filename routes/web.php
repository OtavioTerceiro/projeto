<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\XmlController;
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


Route::post('enviar/xml', [XmlController::class,'enviar'])->middleware(['auth'])->name('enviar.xml'); //agora vai no form e coloca


Route::get('/produtos', [ProdutosController::class,'index'])->middleware(['auth'])->name('produtos');

Route::post('/produtos/salvar', [ProdutosController::class,'salvar'])->middleware(['auth'])->name('produtos.salvar');

Route::get('/produtos_listar', [ProdutosController::class,'listarProdutos'])->middleware(['auth'])->name('listar');

Route::get('/dar_baixa_busca',[ProdutosController::class,'buscarProduto'])
->middleware(['auth'])->name('dar_baixa_busca');

Route::get('/dar_baixa',[ProdutosController::class,'darBaixa'])->middleware(['auth'])->name('dar_baixa');

Route::post('/dar_baixa/{cod_prod}',[ProdutosController::class,'baixaTransacao'])->middleware(['auth'])->name('baixa.transacao');

Route::get('/cancelar_baixa', function(){
    return view('cancelar_baixa');
})->middleware(['auth'])->name('cancelar_baixa');

Route::get('/lista_cancelar_baixa',[TransacaoController::class,'index'])->middleware(['auth'])->name('transacao.index');
// esse é para o form
Route::get('/listar_transacoes', [TransacaoController::class,'mostrarTransacoes'])->middleware(['auth'])->name('listar_transacoes');
// esse mostra a tabela
Route::post('/cancelar_transacao/{id}', [TransacaoController::class,'cancelarBaixa'])->middleware(['auth'])->name('cancelar_transacao');
//  esse cancela a baixa

Route::get('/listar_funcionarios',[FuncionarioController::class,'listarFuncionarios'])->middleware(['auth'])->name('listar_funcionarios');

Route::post('/excluir_funcionario',[FuncionarioController::class,'excluirFuncionario'])->middleware(['auth'])->name('excluir_funcionario');

Route::post('/editar_funcionario',[FuncionarioController::class,'editarFuncionario'])->middleware(['auth'])->name('editar_funcionario');


require __DIR__.'/auth.php';

