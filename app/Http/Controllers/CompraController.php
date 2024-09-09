<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::paginate(10);
        return view('admin.compras.index', compact('compras'));
    }

    public function create()
    {
        return view('admin.compras.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'produto' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'quantidade' => 'required|integer',
            'data_compra' => 'required|date',
        ]);

        Compra::create($validatedData);

        return redirect()->route('admin.compras.index')->with('success', 'Compra cadastrada com sucesso!');
    }

    public function edit(Compra $compra)
    {
        return view('admin.compras.edit', compact('compra'));
    }

    public function update(Request $request, Compra $compra)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'produto' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'quantidade' => 'required|integer',
            'data_compra' => 'required|date',
        ]);

        $compra->update($validatedData);

        return redirect()->route('admin.compras.index')->with('success', 'Compra atualizada com sucesso!');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('admin.compras.index')->with('success', 'Compra deletada com sucesso!');
    }
}
