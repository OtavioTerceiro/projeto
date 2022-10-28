<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Fornecedor::factory(10)->create();
        // User::create([
        //     'name' => 'otavio',
        //     'email' => 'otavio@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);Gil

        $produtos = ['Filé de frango', 'Rapadura', 'Cuscuz', 'Feijão', 'Arroz', 'Mandioca', 'Vitamina', 'Coca Cola', 'Jiló', 'Alface', 'Arroz Integral'];
        foreach($produtos as $produto) {
            Produto::create([
                'nome_produto' => $produto,
                'unidade_medida' => 'KG',
                'id_fornecedor' => 6,
                'preco' => 70,
                'departamento_produto' => 'vendas',
                'quantidade_embalagem' => 10,
                'quantidade' => 10,
                'id_link' => 6
            ]);
        }
    }

}
