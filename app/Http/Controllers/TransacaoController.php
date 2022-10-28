<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
   public function index(){
      return view('transacao.index');
   }
   public function mostrarTransacoes(Request $request){
      $transacoes = Transacao::where('id_produto', $request->codigo_produto)
         ->whereBetween('data_trans', [$request->date, $request->date2])
         ->where('operacao', 1)->get();
      return view('lista_cancelar_baixa', compact('transacoes'));
   }
   public function cancelarBaixa(Request $request){
      $transacao = Transacao::where('id', $request->id)->first();
    
      $produto = Produto::where('id', $transacao->id_produto)->first();
      Produto::find($transacao->id_produto)->update(['quantidade' => $produto->quantidade + $transacao->qtd_transacao]);

      $transacao->operacao = 0;
      $transacao->observacao = 'Cancelamento REF Transação: '.$transacao->id;
      Transacao::create($transacao->toArray());

      Transacao::find($transacao->id)->update(['observacao' => 'Cancelada']);

      return redirect()->route('cancelar_baixa')->with('status', 'Cancelamento da baixa concluído!');
   }
}

//$result = $conexao->query("SELECT * FROM transacao WHERE data_trans BETWEEN '{$_GET['date']}' AND '{$_GET['date2']}' AND cod_prod = {$_GET['codigo_produto']} AND operacao = 1")->fetch_all(MYSQLI_ASSOC);

/*
include("conexao.php");

   $cod_transacao = $_POST["lista"];

   $id_transacao = $conexao->query("SELECT * FROM transacao WHERE id_transacao = {$cod_transacao} AND operacao = 1")->fetch_assoc();
   $qtd_trans = $id_transacao['qtd_saida']; 
   $cod_prod = $id_transacao['cod_prod'];

   $id = $conexao->query("SELECT * FROM produto_cadastrar WHERE cod_produto = {$cod_prod}")->fetch_assoc();
   $quantidade = $id['quantidade'];

   /*echo "<br>".$quantidade;*/

   /* TRANSAÇÃO 
   $qtd_trans *= -1;
   $atualizar = $conexao->query("UPDATE produto_cadastrar SET quantidade = quantidade + {$qtd_trans} WHERE cod_produto = {$cod_prod}");

   /*echo "Cancelamento concluida, quantidade atual: ".$quantidade;

   if($atualizar){
      $conexao->query("DELETE FROM transacao WHERE id_transacao = {$cod_transacao}");
      header("location: {$_SERVER['HTTP_REFERER']}");
   }else{

      echo"SE LEU MAMOU";

   }
   */
