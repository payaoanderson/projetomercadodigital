<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto; // Corrigir a importação
use Illuminate\Http\Request;

class VendaController extends Controller
{
    // Exibe todas as vendas
    public function index()
    {
        $vendas = Venda::paginate(10);  // Paginar as vendas
        return view('admin.vendas.index', compact('vendas'));
    }

    public function create()
    {
        $produtos = Produto::all();  // Buscar todos os produtos
        return view('admin.vendas.create', compact('produtos'));
    }

    // Armazenar a nova venda
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'produto_id' => 'required|exists:produtos,id', // Usar o ID do produto
            'quantidade' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'data_venda' => 'required|date',
        ]);

        // Criar nova venda
        Venda::create([
            'produto_id' => $request->input('produto_id'), // Usar o ID do produto
            'quantidade' => $request->input('quantidade'),
            'total' => $request->input('total'),
            'data_venda' => $request->input('data_venda'),
        ]);

        return redirect()->route('vendas.index')->with('success', 'Venda criada com sucesso!');
    }

    // Mostrar o formulário de edição de vendas
    public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        $produtos = Produto::all();  // Buscar todos os produtos
        return view('admin.vendas.edit', compact('venda', 'produtos'));
    }

    // Atualizar a venda
    public function update(Request $request, $id)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'total' => 'required|numeric',
            'data_venda' => 'required|date',
        ]);
    
        $venda = Venda::findOrFail($id);
        $venda->produto_id = $request->input('produto_id');
        $venda->quantidade = $request->input('quantidade');
        $venda->total = $request->input('total');
        $venda->data_venda = $request->input('data_venda');
        $venda->save();
    
        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso.');
    }

    // Exclui uma venda do banco de dados
    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso.');
    }
}
