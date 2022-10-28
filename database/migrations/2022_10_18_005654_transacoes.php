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
            $table->string('motivo_saida')->nullable();
            $table->foreignId('id_fornecedor')->nullable()->constrained('fornecedores')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nNF')->nullable()->max(200);
            $table->foreignId('id_produto')->nullable()->constrained('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('preco'); //
            $table->decimal('qtd_transacao')->nullable();
            // $table->decimal('qtd_entrada')->nullable();
            // $table->decimal('qtd_saida')->nullable();
            $table->foreignId('id_xml')->nullable()->constrained('xml')->onDelete('cascade')->onUpdate('cascade');
            $table->string('observacao')->nullable();
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
