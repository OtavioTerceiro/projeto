<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nome_produto',
        'unidade_medida',
        'fornecedor',
        'preco',
        'departamento_produto',
        'quantidade_embalagem',
        'quantidade',
        'id_link'
    ];
}
