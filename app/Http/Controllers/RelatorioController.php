<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use Illuminate\Http\Request;
use Carbon\Carbon; // Importar a classe Carbon

class RelatorioController extends Controller
{
    // Listar todos os relatórios
    public function index()
    {
        $relatorios = Relatorio::paginate(10);  // Paginação de 10 itens
        return view('admin.relatorios.index', compact('relatorios'));
    }

    // Exibir formulário de criação
    public function create()
    {
        return view('admin.relatorios.create');
    }

    // Salvar novo relatório
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_relatorio' => 'required|date',
        ]);

        // Converter a data para o formato adequado, se necessário
        $validated['data_relatorio'] = Carbon::parse($validated['data_relatorio']);

        Relatorio::create($validated);

        return redirect()->route('relatorios.index')->with('success', 'Relatório criado com sucesso!');
    }

    // Exibir formulário de edição
    public function edit($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        return view('admin.relatorios.edit', compact('relatorio'));
    }

    // Atualizar um relatório
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_relatorio' => 'required|date',
        ]);

        $relatorio = Relatorio::findOrFail($id);

        $relatorio->titulo = $request->input('titulo');
        $relatorio->descricao = $request->input('descricao');
        // Converter a data para o formato adequado, se necessário
        $relatorio->data_relatorio = Carbon::parse($request->input('data_relatorio'));

        $relatorio->save();

        return redirect()->route('relatorios.index')->with('success', 'Relatório atualizado com sucesso!');
    }

    // Deletar um relatório
    public function destroy($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->delete();

        return redirect()->route('relatorios.index')->with('success', 'Relatório excluído com sucesso!');
    }
}
