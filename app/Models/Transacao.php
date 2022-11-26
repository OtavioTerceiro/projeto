<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;
    protected $table = 'transacoes';
    public $timestamps = false;

    protected $fillable = [
        'data_trans',
        'operacao',
        'motivo_saida',
        'id_fornecedor',
        'nNF',
        'id_produto',
        'preco',
        'qtd_transacao',
        'id_xml',
        'observacao',
        'func_id'
    ];

    public function funcionario(){
        return $this->belongsTo(User::class);
    }
}
