<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('configuracoes')->insert([
            ['44444444444' => '123587'],
            ['4123' => '4548'],
        ]);
    }
}