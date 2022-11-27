<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Transacao;
use Illuminate\Http\Request;
use App\Models\User;

class ProdutosController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('produto_cadastrar', compact('fornecedores'));
    }

    public function salvar(Request $request)
    {

        $request->validate([
            '*' => 'required',
            'preco' => ['numeric'],
            'quantidade_embalagem' => ['numeric'],
            'id_link' => ['numeric'],
            'quantidade' => ['numeric'],

        ], [
            'nome_produto.required' => 'O campo Nome do Produto é obrigatório!',
            'unidade_medida.required' => 'O campo Unidade de Medidada é obrigatório!',
            'preco.numeric' => 'O campo preço tem que ser numérico!',
            'departamento_produto.required' => 'O campo Departamento é obrigatório!',
            'quantidade_embalagem.numeric' => 'O campo quantidade da embalagem é obrigatório!',
            'quantidade.numeric' => 'O campo quantidade é obrigatório!',
            'id_link.numeric' => 'O campo Código da XML tem que ser numérico!'

        ]);
        $dados = $request->except('_token');
        $dados['func_id'] = auth()->user()->id;
        Produto::create($dados);

        return back()->with('status', 'Dados salvos com sucesso!');
    }
    // é método porque é poo.
    public function buscarProduto(Request $request)
    {
        return view('dar_baixa_busca');
    }
    // agora tem que ver na web.php a rota pra busca se tá certo
    public function darBaixa(Request $request)
    {
        $request->validate([
            'cod_prod' => ['required', 'numeric', 'exists:produtos,id']

        ], [
            'cod_prod.required' => 'O campo Código do produto é obrigatório!',
            'cod_prod.numeric' => 'O campo Código do produto tem que ser numérico!',
            'cod_prod.exists' => 'O produto não existe!'
        ]);
        $produto = Produto::findOrFail($request->cod_prod);
        return view('dar_baixa', compact('produto'));
    }

    public function baixaTransacao(Request $request)
    {

        $request->validate([
            'quantidade' => ['required', 'numeric'],
            'motivo_saida' => ['required', 'in:Venda,Devolucao,Avaria,Garantia']
        ], [
            'quantidade.required' => 'O campo Quantidade é obrigatório!',
            'quantidade.numeric' => 'O campo Quantidade tem que ser numérico!',
            'motivo_saida.required' =>  'O campo Motivo de Saída é obrigatório!',
            'motivo_saida.in' =>  'O campo Motivo de Saída deve ser Venda, Devolução, Avaria ou Garantia!',
        ]);


        $produto = Produto::findOrFail($request->cod_prod);
        if($request->quantidade > $produto->quantidade){
            return back()->with('error','Valor ultrapassa o limite permitido');
        }
        $produto->update([
            'quantidade' => $produto->quantidade - $request->quantidade
        ]);
        Transacao::create([
            'data_trans' => now(),
            'operacao' => 1,
            'motivo_saida' => $request->motivo_saida,
            //'id_fornecedor' => 1, // não tem fornecedor ou é consusmidor final eu estou dizendo que 0 vai representar o consumidor final
            'preco' => $produto->preco,
            'qtd_transacao' => $request->quantidade,
            'id_produto' => $produto->id,
            'func_id' => auth()->user()->id,
        ]);
        return back()->with('status', 'Baixa realizada com sucesso!'); //testa aí
    }

    public function listarProdutos(Request $request)
    {
        if ($request->busca) {
            $produtos = Produto::where('nome_produto', 'LIKE', "%{$request->busca}%")->paginate(10);
        } else {
            $produtos = Produto::paginate(10);
        }

        return view('listar_produto', compact('produtos'));
    }

    public function editarProduto(Request $request){
        $credenciais = $request->validate([
            'nome_produto' => 'required | string',
            'preco' => 'required | decimal',
            'quantidade_embalagem' => 'required | decimal',
            'id_link' => 'required | int',
            'unidade_medida' => 'required | string',
            'departamento_produto' =>'required | string',

        ]);

        User::find($request->id)->update($credenciais);

        return back()->with('status', 'Produto editado com sucesso!');
    }

    public function excluirProduto(Request $request){
        User::find($request->id)->delete();
        return back()->with('status', 'Produto excluído com sucesso!');
    }
}
