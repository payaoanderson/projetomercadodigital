<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Relatorio;
use Carbon\Carbon;

class RelatorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dados fictícios para a tabela relatorios
        Relatorio::create([
            'titulo' => 'Relatório de Vendas 2024',
            'descricao' => 'Análise detalhada das vendas realizadas no ano de 2024.',
            'data_relatorio' => Carbon::create('2024', '09', '11'),
        ]);

        Relatorio::create([
            'titulo' => 'Relatório de Compras 2023',
            'descricao' => 'Resumo das compras realizadas ao longo do ano de 2023.',
            'data_relatorio' => Carbon::create('2023', '12', '31'),
        ]);

        Relatorio::create([
            'titulo' => 'Relatório de Desempenho Mensal',
            'descricao' => 'Relatório referente ao desempenho das vendas em janeiro de 2024.',
            'data_relatorio' => Carbon::create('2024', '01', '31'),
        ]);

        Relatorio::create([
            'titulo' => 'Relatório Financeiro',
            'descricao' => 'Análise financeira para o primeiro trimestre de 2024.',
            'data_relatorio' => Carbon::create('2024', '03', '31'),
        ]);
    }
}
