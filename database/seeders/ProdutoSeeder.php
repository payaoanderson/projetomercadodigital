<?php

namespace Database\Seeders;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    public function run()
    {
        $produtos = Produto::all();

        foreach ($produtos as $produto) {
            Compra::create([
                'produto_id' => $produto->id,  // Certifique-se de usar produto_id
                'quantidade' => rand(1, 100),
                'preco' => rand(10, 100) + rand(0, 99) / 100,
                'data_compra' => now()->subDays(rand(0, 365)),
            ]);
        }
    }
}