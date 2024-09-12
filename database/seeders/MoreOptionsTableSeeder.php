<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoreOptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('more_options')->insert([
            ['title' => 'Ajuda', 'content' => 'Instruções de como obter ajuda.'],
            ['title' => 'Suporte', 'content' => 'Instruções de como obter suporte.'],
        ]);
    }
}