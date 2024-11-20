<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;

class ApiVendaController extends Controller
{
    // Listar vendas com paginação
    public function index()
    {
        $vendas = Venda::with('produto')->paginate(10); // Inclui informações do produto associado
        return response()->json($vendas, 200);
    }

    // Detalhes de uma venda específica
    public function show($id)
    {
        $venda = Venda::with('produto')->find($id);

        if (!$venda) {
            return response()->json(['error' => 'Venda não encontrada'], 404);
        }

        return response()->json($venda, 200);
    }

    // Criar uma nova venda
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id', // Verifica se o produto existe
            'quantidade' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'data_venda' => 'required|date',
        ]);

        $venda = Venda::create([
            'produto_id' => $request->input('produto_id'),
            'quantidade' => $request->input('quantidade'),
            'total' => $request->input('total'),
            'data_venda' => $request->input('data_venda'),
        ]);

        return response()->json($venda, 201); // Código 201 indica que o recurso foi criado
    }

    // Atualizar uma venda existente
    public function update(Request $request, $id)
    {
        $venda = Venda::find($id);

        if (!$venda) {
            return response()->json(['error' => 'Venda não encontrada'], 404);
        }

        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'data_venda' => 'required|date',
        ]);

        $venda->update([
            'produto_id' => $request->input('produto_id'),
            'quantidade' => $request->input('quantidade'),
            'total' => $request->input('total'),
            'data_venda' => $request->input('data_venda'),
        ]);

        return response()->json($venda, 200);
    }

    // Excluir uma venda
    public function destroy($id)
    {
        $venda = Venda::find($id);

        if (!$venda) {
            return response()->json(['error' => 'Venda não encontrada'], 404);
        }

        $venda->delete();

        return response()->json(['message' => 'Venda excluída com sucesso'], 200);
    }
}
