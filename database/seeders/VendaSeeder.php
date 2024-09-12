<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $produtoId = DB::table('produtos')->pluck('id'); // Obtém todos os IDs de produtos

        foreach (range(1, 10) as $index) {
            DB::table('vendas')->insert([
                'produto_id' => 1,  // Certifique-se de que o produto existe
                'quantidade' => 72,
                'total' => 70,
                'data_venda' => '2004-07-13',
            ]);
        }
    }
}
