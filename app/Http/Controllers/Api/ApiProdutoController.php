<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Produto;
use Illuminate\Http\Request;

class ApiProdutoController extends Controller
{
    // Listar todos os produtos com paginação
    public function index()
    {
        $produtos = Produto::paginate(10);
        return response()->json($produtos, 200);
    }

    // Exibir detalhes de um único produto
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto, 200);
    }

    // Criar um novo produto
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação da imagem
        ]);

        $data = $request->all();

        // Processa o upload da imagem
        if ($request->hasFile('imagem')) {
            $imageName = time() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('images'), $imageName);
            $data['imagem'] = $imageName;
        }

        $produto = Produto::create($data);

        return response()->json($produto, 201); // 201 = Created
    }

    // Atualizar um produto existente
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação da imagem
        ]);

        $data = $request->all();

        // Processa o upload da imagem, se for fornecida
        if ($request->hasFile('imagem')) {
            $imageName = time() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('images'), $imageName);
            $data['imagem'] = $imageName;
        }

        $produto->update($data);

        return response()->json($produto, 200); // 200 = OK
    }

    // Deletar um produto
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto deletado com sucesso'], 200);
    }
}
