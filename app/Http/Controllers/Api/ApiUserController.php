<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Produto;
use App\Models\AccessLog;
use App\Models\Venda;
use App\Models\Compra;
use App\Models\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    // Dashboard para a API
    public function dashboard()
    {
        $dashboardData = [
            'totalUsuarios' => User::count(),
            'totalProdutos' => Produto::count(),
            'totalVenda' => Venda::count(),
            'totalRelatorio' => Relatorio::count(),
            'totalCompra' => Compra::count(),
            'totalAcessos' => AccessLog::count(),
        ];

        return response()->json($dashboardData, 200);
    }

    // Listar usuários com paginação
    public function index()
    {
        $users = User::paginate(10); // Retorna 10 usuários por página
        return response()->json($users, 200);
    }

    // Exibir detalhes de um usuário específico
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        return response()->json($user, 200);
    }

    // Criar um novo usuário
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201); // 201 = Created
    }

    // Atualizar um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json($user, 200);
    }

    // Deletar um usuário
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso'], 200);
    }
}
