<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $profiles = UserProfile::with('user')->paginate(10);
        return view('admin.user_profiles.index', compact('profiles'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.user_profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
        ]);

        UserProfile::create($request->all());

        return redirect()->route('user_profiles.index')->with('success', 'Perfil criado com sucesso.');
    }

    public function edit(UserProfile $userProfile)
    {
        return view('admin.user_profiles.edit', compact('userProfile'));
    }

    public function update(Request $request, UserProfile $userProfile)
    {
        $request->validate([
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
        ]);

        $userProfile->update($request->all());

        return redirect()->route('user_profiles.index')->with('success', 'Perfil atualizado com sucesso.');
    }

    public function destroy(UserProfile $userProfile)
    {
        $userProfile->delete();

        return redirect()->route('user_profiles.index')->with('success', 'Perfil excluído com sucesso.');
    }
}