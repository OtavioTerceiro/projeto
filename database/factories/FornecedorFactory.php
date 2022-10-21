<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_fornecedor' => $this->faker->company,
            'cnpj_fornecedor' => $this->faker->cnpj,
        ];
    }
}
