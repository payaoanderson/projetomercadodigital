<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;

class ApiCompraController extends Controller
{
    // Listar todas as compras
    public function index()
    {
        $compras = Compra::with('produto')->paginate(10);
        return response()->json($compras, 200); // Resposta paginada com status 200 (OK)
    }

    // Criar uma nova compra
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produto' => 'required|string|exists:produtos,nome',
            'quantidade' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'data_compra' => 'required|date',
        ]);

        $produto = Produto::where('nome', $validated['produto'])->firstOrFail();

        $compra = Compra::create([
            'produto_id' => $produto->id,
            'quantidade' => $validated['quantidade'],
            'preco' => $validated['preco'],
            'data_compra' => $validated['data_compra'],
        ]);

        return response()->json([
            'message' => 'Compra criada com sucesso!',
            'data' => $compra,
        ], 201); // Status 201 (Created)
    }

    // Exibir uma compra específica
    public function show($id)
    {
        $compra = Compra::with('produto')->find($id);

        if (!$compra) {
            return response()->json(['message' => 'Compra não encontrada.'], 404); // Status 404 (Not Found)
        }

        return response()->json($compra, 200); // Status 200 (OK)
    }

    // Atualizar uma compra
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'produto' => 'required|string|exists:produtos,nome',
            'quantidade' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'data_compra' => 'required|date',
        ]);

        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['message' => 'Compra não encontrada.'], 404);
        }

        $produto = Produto::where('nome', $validated['produto'])->firstOrFail();

        $compra->update([
            'produto_id' => $produto->id,
            'quantidade' => $validated['quantidade'],
            'preco' => $validated['preco'],
            'data_compra' => $validated['data_compra'],
        ]);

        return response()->json([
            'message' => 'Compra atualizada com sucesso!',
            'data' => $compra,
        ], 200); // Status 200 (OK)
    }

    // Deletar uma compra
    public function destroy($id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['message' => 'Compra não encontrada.'], 404);
        }

        $compra->delete();

        return response()->json(['message' => 'Compra excluída com sucesso!'], 200);
    }
}
