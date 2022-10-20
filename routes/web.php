<?php

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

Route::get('/produtos', function(){
    return view('produto_cadastrar');
})->middleware(['auth'])->name('produtos');

Route::get('/produtos_listar', function(){
    return view('listar_produto');
})->middleware(['auth'])->name('listar');

Route::get('/dar_baixa', function(){
    return view('dar_baixa');
})->middleware(['auth'])->name('dar_baixa');

require __DIR__.'/auth.php';
