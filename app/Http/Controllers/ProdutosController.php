<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Transacao;
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
    // é método porque é poo.
    public function buscarProduto(Request $request){
        return view('dar_baixa_busca');
    }
    // agora tem que ver na web.php a rota pra busca se tá certo
    public function darBaixa(Request $request){
        $produto = Produto::findOrFail($request->cod_prod);
        return view('dar_baixa',compact('produto')); 
    }

    public function baixaTransacao(Request $request){
        $produto = Produto::findOrFail($request->cod_prod);
        $produto->update([
            'quantidade' => $produto->quantidade - $request->quantidade
        ]);
        Transacao::create([
            'data_trans' => now(),
            'operacao' => 1,
            'id_fornecedor' => 1, // não tem fornecedor ou é consusmidor final eu estou dizendo que 0 vai representar o consumidor final
            'preco' => $produto->preco, 
            'qtd_saida' => $request->quantidade,
            'id_produto' => $produto->id,
        ]);
        return back()->with('status','Baixa realizada com sucesso!'); //testa aí
    }
    // crie o método darbaixa testa
}