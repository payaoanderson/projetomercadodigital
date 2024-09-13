@extends('layout.app')

@section('content')
<div class="container">
    <h2>Lista de Perfis</h2>

    <a href="{{ route('user_profiles.create') }}" class="btn btn-primary mb-3">Novo Perfil</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Bio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->id }}</td>
                <td>{{ $profile->user->name }}</td>
                <td>{{ $profile->address }}</td>
                <td>{{ $profile->phone }}</td>
                <td>{{ $profile->bio }}</td>
                <td>
                    <a href="{{ route('user_profiles.edit', $profile->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('user_profiles.destroy', $profile->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $profiles->links('vendor.pagination.numeric') }}
</div>
@endsection
