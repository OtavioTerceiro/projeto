<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->date('data_trans');
            $table->boolean('operacao');
            $table->foreignId('id_fornecedor')->constrained('fornecedores')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nNF')->max(200);
            $table->foreignId('id_produto')->nullable()->constrained('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('preco',2); 
            $table->decimal('qtd_entrada',2); 
            $table->decimal('qtd_saida',2); 
            $table->foreignId('id_xml')->constrained('xml')->onDelete('cascade')->onUpdate('cascade');
        });
    }           

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
