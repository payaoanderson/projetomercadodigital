<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $produtoIds = DB::table('produtos')->pluck('id'); // Obtém todos os IDs de produtos

        foreach (range(1, 10) as $index) {
            DB::table('compras')->insert([
                'produto_id' => $faker->randomElement($produtoIds), // Escolhe um ID de produto aleatoriamente
                'quantidade' => $faker->numberBetween(1, 100),
                'preco' => $faker->randomFloat(2, 1, 100),
                'data_compra' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}