<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto')->max(150);
            $table->string('unidade_medida')->max(50);
            $table->foreignId("fornecedor")->constrained('fornecedores')->onDelete('cascade')->onUpdate('cascade'); 
            $table->decimal("preco",8);//double
            $table->string("departamento_produto")->max(150);
            $table->integer("quantidade_embalagem"); //int
            $table->integer("quantidade")->nullable();
            $table->integer("id_link")->nullable(); //int
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
