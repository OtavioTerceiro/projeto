<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        $fornecedores = Fornecedor::all();
        return view('produto_cadastrar',compact('fornecedores'));
    }

    public function salvar(Request $request){
        //dd($request->all());
        Produto::create($request->all());
        return back()->with('status','Dados salvos com sucesso!');
    }
}
