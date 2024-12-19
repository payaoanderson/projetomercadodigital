<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiProdutoController extends Controller
{
    /**
     * Listar todos os produtos com paginação.
     */
    public function index()
    {
        $produtos = Produto::paginate(10);
        return response()->json($produtos, 200);
    }

    /**
     * Exibir detalhes de um único produto.
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto, 200);
    }

    /**
     * Criar um novo produto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $path;
        }

        $produto = Produto::create($data);

        return response()->json($produto, 201);
    }

    /**
     * Atualizar um produto existente.
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagem')) {
            // Remove a imagem antiga, se existir
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }

            $path = $request->file('imagem')->store('produtos', 'public');
            $data['imagem'] = $path;
        }

        $produto->update($data);

        return response()->json($produto, 200);
    }

    /**
     * Deletar um produto.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        // Remove a imagem associada, se existir
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto deletado com sucesso'], 200);
    }
}
