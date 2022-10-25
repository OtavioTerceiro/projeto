<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Transacao;
use App\Models\Xml;
use Illuminate\Http\Request;

class XmlController extends Controller
{

    public function enviar(Request $request)
    {
        $arquivo_xml= $request->file('xml');
        // salva o arquivo xml na variavel xml
        $dados_xml = simplexml_load_file($arquivo_xml);
        $dados['id'] = str_replace("NFe", "", $dados_xml->NFe->infNFe['Id']);
        $dados['numeronf'] = $dados_xml->NFe->infNFe->ide->nNF;
        $dados['emitente']= $dados_xml->NFe->infNFe->emit->xNome;
        $dados['emitentecnpj'] = $dados_xml->NFe->infNFe->emit->CNPJ;

		if(Xml::where('chave', $dados['id'])->exists()) {
			return back()->with('error', 'xml já existe');
		}
		
		$arquivo_xml->storeAs('xml', $arquivo_xml->getClientOriginalName());
        // salva o nome do arquivo no banco de dados
        $xml = new Xml();
		$xml->chave = $dados['id'];//roda
		$xml->save();
		
		if(!Fornecedor::where('cnpj_fornecedor', $dados['emitentecnpj'])->exists()){
			// verifica se o fornecedor já existe e se não existir ele cria um novo,
			$fornecedor = new Fornecedor();
			$fornecedor->nome_fornecedor = $dados['emitente'];
			$fornecedor->cnpj_fornecedor = $dados['emitentecnpj'];
			$fornecedor->save();
		}else{ // caso exista ele pega o fornecedor pelo cnpj da xml e salva na tabela transacao
			$fornecedor = Fornecedor::where('cnpj_fornecedor', $dados['emitentecnpj'])->first();
		}

			foreach ($dados_xml->NFe->infNFe->det as $item) {
				Transacao::create([
					'data_trans' => now(),
					'operacao' => 0,					// 0 = entrada, 1 = saida
					'id_fornecedor' => $fornecedor->id,
					'nNF' => $dados['numeronf'],
					'preco' => $item->prod->vUnCom,
					'qtd_entrada' => $item->prod->qCom,
					'qtd_saida' => null, //vai mudar?
					'id_xml' => $xml->id, //se for mudar vai ter que alterar o model a migration e rodar
				]);
			}
        return back()->with('status', 'Arquivo enviado com sucesso!');
    }
}
