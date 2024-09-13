@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Perfil</h2>

    <form action="{{ route('user_profiles.update', $userProfile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Usuário</label>
            <input type="text" value="{{ $userProfile->user->name }}" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $userProfile->address }}">
        </div>

        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $userProfile->phone }}">
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ $userProfile->bio }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
