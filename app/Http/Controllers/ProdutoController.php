<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{


    public function dashboard()
{
    $totalProdutos = Produto::count();
    
    return view('admin.dashboard', compact('totalProdutos'));
}




    public function index()
    {
        $produtos = Produto::paginate(10);
        return view('admin.produtos.index', compact('produtos')); // caminho correto para a view
    }
    
    public function create()
    {
        return view('admin.produtos.create'); // caminho correto para a view
    }
    
    public function edit(Produto $produto)
    {
        return view('admin.produtos.edit', compact('produto')); // caminho correto para a view
    }

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
    
        Produto::create($data);
    
        return redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso.');
    }
    
    public function update(Request $request, Produto $produto)
    {
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
    
        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso.');
    }
    
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')
            ->with('success', 'Produto deletado com sucesso.');
    }
}
