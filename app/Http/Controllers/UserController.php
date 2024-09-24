<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Método para exibir o dashboard com a contagem de usuários
    public function dashboard() {
        $totalUsuarios = User::count(); // Corrigido para $totalUsuarios
        return view('admin.dashboard', compact('totalUsuarios')); // Certifique-se de que a view existe e está correta
    }

    // Método para listar usuários com paginação
    public function index()
    {
        $users = User::paginate(10); // Retorna 10 usuários por página
        return view('admin.users.index', compact('users'));
    }

    // Método para exibir o formulário de criação de usuários
    public function create()
    {
        return view('admin.users.create');
    }

    // Método para armazenar um novo usuário
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // Valida email único
            'password' => 'required|string|min:8|confirmed', // Confirmação de senha
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash da senha
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    // Método para editar um usuário
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Método para atualizar um usuário
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Valida o email exceto o atual
            'password' => 'nullable|string|min:8|confirmed', // A senha é opcional na atualização
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Verifica se a senha foi preenchida e atualiza
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Salva as alterações no banco

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    // Método para deletar um usuário
    public function destroy(User $user)
    {
        $user->delete(); // Exclui o usuário
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
    }
}
