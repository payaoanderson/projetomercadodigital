<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Listar todas as compras
    public function index() {
        $compras = Compra::with('produto')->paginate(10);
        return view('admin.compras.index', compact('compras'));
    }
    // Exibir formulário de criação
    public function create()
    {
        $produtos = Produto::all(); // Obter todos os produtos
        return view('admin.compras.create', compact('produtos'));
    }

    // Salvar nova compra
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produto' => 'required|string|exists:produtos,nome', // Verificar se o produto existe na tabela produtos
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'data_compra' => 'required|date',
        ]);
    
        // Encontrar o ID do produto com base no nome
        $produto = Produto::where('nome', $validated['produto'])->first();
        
        if (!$produto) {
            return redirect()->back()->withErrors(['produto' => 'Produto não encontrado.']);
        }
    
        // Adicionar o produto_id ao array de dados
        $validated['produto_id'] = $produto->id;
    
        // Remover o campo 'produto' do array
        unset($validated['produto']);
    
        // Criar a compra
        Compra::create($validated);
    
        return redirect()->route('compras.index')->with('success', 'Compra criada com sucesso!');
    }

    // Exibir formulário de edição
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $produtos = Produto::all(); // Obter todos os produtos
        return view('admin.compras.edit', compact('compra', 'produtos'));
    }

    // Atualizar uma compra
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'produto' => 'required|string|exists:produtos,nome', // Verificar se o produto existe na tabela produtos
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'data_compra' => 'required|date',
        ]);

        $compra = Compra::findOrFail($id);

        // Encontrar o ID do produto com base no nome
        $produto = Produto::where('nome', $validated['produto'])->first();
        
        if (!$produto) {
            return redirect()->back()->withErrors(['produto' => 'Produto não encontrado.']);
        }

        // Adicionar o produto_id ao array de dados
        $validated['produto_id'] = $produto->id;
    
        // Remover o campo 'produto' do array
        unset($validated['produto']);

        $compra->update($validated);

        return redirect()->route('compras.index')->with('success', 'Compra atualizada com sucesso!');
    }

    // Deletar uma compra
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        return redirect()->route('compras.index')->with('success', 'Compra excluída com sucesso!');
    }
}