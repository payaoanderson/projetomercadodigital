<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produto;
use App\Models\AccessLog;
use App\Models\Venda;
use App\Models\Compra;
use App\Models\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Dashboard da área administrativa
    public function dashboard()
    {
        $totalUsuarios = User::count();
        $totalProdutos = Produto::count();
        $totalVenda = Venda::count();
        $totalRelatorio = Relatorio::count();
        $totalCompra = Compra::count();
        $totalAcessos = AccessLog::count();

        return view('admin.dashboard', compact('totalUsuarios', 'totalProdutos', 'totalAcessos', 'totalVenda', 'totalCompra', 'totalRelatorio'));
    }

    // Método para listar usuários com paginação
    public function index()
    {
        $users = User::paginate(10); // Exibe 10 usuários por página
        return view('admin.users.index', compact('users'));
    }

    // Método para exibir o formulário de criação de usuário
    public function create()
    {
        return view('admin.users.create');
    }

    // Método para armazenar um novo usuário
    public function store(Request $request)
    {
        // Validação dos dados do formulário de criação de usuário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // O email deve ser único na tabela de usuários
            'password' => 'required|string|min:8|confirmed', // Confirmação de senha
        ]);

        // Criação de um novo usuário com hash de senha
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redireciona com mensagem de sucesso após a criação
        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    // Método para exibir o formulário de edição de usuário
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Método para atualizar um usuário existente
    public function update(Request $request, User $user)
    {
        // Validação dos dados atualizados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Valida o email, exceto o do próprio usuário
            'password' => 'nullable|string|min:8|confirmed', // A senha é opcional
        ]);

        // Atualiza os campos do usuário
        $user->name = $request->name;
        $user->email = $request->email;

        // Verifica se a senha foi preenchida para atualizar
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Salva as alterações no banco de dados
        $user->save();

        // Redireciona com mensagem de sucesso após a atualização
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    // Método para deletar um usuário
    public function destroy(User $user)
    {
        $user->delete(); // Exclui o usuário
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
    }
}
