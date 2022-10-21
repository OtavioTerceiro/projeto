<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;
    // protected $table = 'transacoes';
    protected $fillable = [
       'data_trans',
       'operacao',
       'id_fornecedor',
       'nNF',
       'id_produto',
       'preco',
       'qtd_entrada',
       'qtd_saida',
       'entrada_saida'
    ];
}
