<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index()
    {
        return view('transacao.index');
    }
    public function mostrarTransacoes(Request $request)
    {
        $request->validate([
            'codigo_produto' => ['required_with:codigo_produto', 'numeric'],
            'date1' => ['required_with:codigo_produto', 'date', 'before_or_equal:today'],
            'date2' => ['required_with:codigo_produto', 'date', 'before_or_equal:today', 'after_or_equal:date1']
        ],[
            'codigo_produto.required' => 'O campo Código do Produto é obrigatório!',
            'codigo_produto.numeric' => 'O campo Código do Produto tem que ser numérico!',

            'date1.required' => 'O campo Data 01 obrigatório!',
            'date1.date' => 'O campo Data 01 deve ser no formato de data!',
            'date1.before_or_equal' => 'O campo Data 01 deve ser menor ou igual a data de hoje!',
            'date2.required' => 'O campo Data 02 é obrigatório!',
            'date2.date' => 'O campo Data 02 deve ser no formato de data!',
            'date2.before_or_equal' => 'O campo Data 02 deve ser menor ou igual a data de hoje!',
            'date2.after_or_equal' => 'O campo Data 02 deve ser maior ou igual a data de hoje!'
        ]);
        // Transacao::query()->when($request->codigo_produto and $request->busca, function($query){
        //    return $query->where('id_produto', $request->codigo_produto)
        //             ->whereBetween('data_trans', [$request->date1, $request->date2])
        //             ->where('operacao', 1)->where('data_trans', 'LIKE', "%{$request->busca}%")->paginate(10);
        // })->when()
        if ($request->codigo_produto) {
            if ($request->busca) {
                $transacoes = Transacao::where('id_produto', $request->codigo_produto)
                    ->whereBetween('data_trans', [$request->date1, $request->date2])
                    ->where('operacao', 1)->where('data_trans', 'LIKE', "%{$request->busca}%")->paginate(10);
            } else {
                $transacoes = Transacao::where('id_produto', $request->codigo_produto)
                    ->whereBetween('data_trans', [$request->date1, $request->date2])
                    ->where('operacao', 1)->paginate(10);
            }
        } else {
            if ($request->busca) {
                $transacoes = Transacao::where('data_trans', 'LIKE', "%{$request->busca}%")->paginate(10);
            } else {
                $transacoes = Transacao::paginate(10);
            }
        }
        return view('listar_transacoes', compact('transacoes'));
    }

    public function cancelarBaixa(Request $request)
    {
      $request->validate([
         'id' => 'required|numeric|exists:transacoes,id'
      ],[
         'required' => '',
         'numeric' => '',
         'exists' => ''
      ]);

      $transacao = Transacao::where('id', $request->id)->first();

      $produto = Produto::where('id', $transacao->id_produto)->first();
      Produto::find($transacao->id_produto)->update(['quantidade' => $produto->quantidade + $transacao->qtd_transacao]);

      $transacao->operacao = 0;
      $transacao->observacao = 'Cancelamento REF Transação: ' . $transacao->id;
      Transacao::create($transacao->toArray());

      Transacao::find($transacao->id)->update(['observacao' => 'Cancelada']);

      return redirect()->route('cancelar_baixa')->with('status', 'Cancelamento da baixa concluído!');
    }
}
