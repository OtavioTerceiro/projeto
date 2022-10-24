<?php

namespace App\Http\Controllers;

use App\Models\Xml;
use Illuminate\Http\Request;

class XmlController extends Controller
{

    public function enviar(Request $request)
    {
        $xml= $request->file('xml');
        // passa
        // salva o arquivo xml na variavel xml
        $dados_xml = simplexml_load_file($xml);
        $dados['id'] = str_replace("NFe", "", $dados_xml->NFe->infNFe['Id']);
        $dados['numeronf'] = $dados_xml->NFe->infNFe->ide->nNF;
        $dados['emitente']= $dados_xml->NFe->infNFe->emit->xNome;
        $dados['emitentecnpj'] = $dados_xml->NFe->infNFe->emit->CNPJ;
        $dados['precocomp'] = $dados_xml;
        dd($dados);
    //    testa aí pra eu ver um negocio

        //guarda o arquivo na pasta xml com o nome original do arquivo
        $xml->storeAs('xml', $xml->getClientOriginalName());

        // salva o nome do arquivo no banco de dados
        Xml::create([
            'chave' => $xml->getClientOriginalName(),
        ]);
        
        
        
        return back()->with('status', 'Arquivo enviado com sucesso!');
    }
}

// como é que foi feito lá no outro? vai ter uma tela especifica para isso ou vai ser direto?
// pois coloca o codigo aqui comentado.

/*
$chavenfe = str_replace("NFe", "", $xml->NFe->infNFe['Id']);
$numeronf = $xml->NFe->infNFe->ide->nNF;
$emitente = $xml->NFe->infNFe->emit->xNome;
$emitentecnpj = $xml->NFe->infNFe->emit->CNPJ;
//$precocomp = $item->prod->vUnCom;
// $auxiliar=1;
$data_trans = date('Y-m-d');
// Exibe as informações do XML
echo "<h3>Informações da Nota Fiscal</h3>";
echo 'Chave de Acesso: ' . str_replace("NFe", "", $xml->NFe->infNFe['Id']) . '<br>';
echo 'Nota Fiscal: ' . $xml->NFe->infNFe->ide->nNF . '<br>';
echo 'Emitente/Nome: ' . $xml->NFe->infNFe->emit->xNome . '<br>';
echo 'Emitente/CNPJ: ' . $xml->NFe->infNFe->emit->CNPJ . '<br>';
date_default_timezone_set('America/Sao_Paulo');
echo date('Y-m-d');
//$dados = array();


//echo '<pre>';
//print_r($dados);



$result = $conexao->query("SELECT COUNT(*) FROM xml WHERE chave = '{$chavenfe}'");
$row = $result->fetch_row();
if ($row[0] > 0) {
    echo "Nota ja dada entrada";
} else {
    //dar entrada na ota em si
	$conexao->query ("INSERT INTO xml(chave) VALUES('$chavenfe')");

	$identifica_transacao = $conexao->query("SELECT id FROM xml WHERE chave = {$chavenfe}")->fetch_assoc();

	$identifica_transacao = $identifica_transacao['id'];
	/*$db2 = "INSERT INTO produto_cadastrar(quantidade) VALUES('')";
	foreach ($xml->NFe->infNFe->det as $item) {
		//selecionar no banco o produto da tabela cadastrar_produto que tenha id_link igual $item->prod->cProd , e fazer o incremento da coluna quantidade de acordo com $item->prod->qCom.
		
		$conexao->query("UPDATE produto_cadastrar SET quantidade = quantidade + {$item->prod->qCom} WHERE id_link = {$item->prod->cProd}");
		echo $chavenfe;
		$entrada_saida = $conexao->query("SELECT cod_produto FROM produto_cadastrar WHERE id_link = {$item->prod->cProd}")->fetch_assoc();
		$entrada_saida = $entrada_saida['cod_produto'];
		echo "<br>";
		echo "<pre>";
		var_dump($entrada_saida);
		// $pinto2 = $pinto2[];
		//$conexao->query("SELECT * FROM xml('id') WHERE chave = $chavenfe");
		
        //$pinto = 2;
		//$pinto = $pinto['id'];
		// echo "<pre>";
		// print_r($pinto);
		


		$conexao->query("INSERT INTO transacao(data_trans, operacao,fornecedor_cliente, cnpj_fornecedor, nNF, preco, qtd_entrada, entrada_saida, cod_prod) VALUES('{$data_trans}', 0,'{$emitente}', '{$emitentecnpj}', '{$numeronf}', '{$item->prod->vUnCom}','{$item->prod->qCom}','{$identifica_transacao}','{$entrada_saida}' ) ");

		

		$dados[] = array(
			'codigo' => $item->prod->cProd,
			'quantidade' => $item->prod->qCom,
			'valor_unitario' => $item->prod->vUnCom,
	
		);
		// vou analisar
		echo "<tr>";
		echo "<td> Codigo do item:[[{$item->prod->cProd}]] Quantidade comprada: [[{$item->prod->qCom}]] Valor unitario da compra: [[{$item->prod->vUnCom}]] </td><br>";
		echo "</tr>";
	}



//$conexao->prepare($bd)->execute();
$result = $conexao->query("SELECT COUNT(*) FROM fornecedor WHERE cnpj_fornecedor = '{$emitentecnpj}'");
$row = $result->fetch_row();
if ($row[0] > 0) {
    die;
} else {
	$bd = "INSERT INTO fornecedor(nome_fornecedor, cnpj_fornecedor) VALUES('$emitente', '$emitentecnpj')";
	$conexao->prepare($bd)->execute();
}

}

*/