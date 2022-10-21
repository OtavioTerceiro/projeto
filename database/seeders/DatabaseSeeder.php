<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\User;
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
       Fornecedor::factory(10)->create();
       User::create([
           'name' => 'otavio',
           'email' => 'otavio@gmail.com',
           'password' => bcrypt('12345678')
       ]);
    }
}
