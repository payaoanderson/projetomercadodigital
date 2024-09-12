<?php
namespace App\Http\Controllers;

use App\Models\MoreOption;
use Illuminate\Http\Request;

class MoreOptionController extends Controller
{
    public function index()
    {
        $moreOptions = MoreOption::all();
        return view('admin.more_options.index', compact('moreOptions'));
    }

    public function create()
    {
        return view('more_options.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:more_options',
            'content' => 'required|string',
        ]);

        MoreOption::create($request->all());

        return redirect()->route('more_options.index')->with('success', 'Opção criada com sucesso.');
    }

    public function edit(MoreOption $moreOption)
    {
        return view('more_options.edit', compact('moreOption'));
    }

    public function update(Request $request, MoreOption $moreOption)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:more_options,title,' . $moreOption->id,
            'content' => 'required|string',
        ]);

        $moreOption->update($request->all());

        return redirect()->route('more_options.index')->with('success', 'Opção atualizada com sucesso.');
    }

    public function destroy(MoreOption $moreOption)
    {
        $moreOption->delete();

        return redirect()->route('more_options.index')->with('success', 'Opção excluída com sucesso.');
    }

    // Métodos para Ajuda e Suporte
    public function help()
    {
        return view('admin.more_options.help');
    }

    public function support()
    {
        return view('admin.more_options.support');
    }
}