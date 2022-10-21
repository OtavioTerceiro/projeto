<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $table = 'fornecedores';

    // DEFINE OS CAMPOS QUE PODEM SER PREENCHIDOS
    protected $fillable = [        
        'nome_fornecedor',
        'cnpj_fornecedor',
    ];
}
