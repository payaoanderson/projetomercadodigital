@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Compra</h2>

    <form action="{{ route('compras.update', $compra->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Usuário</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $compra->user_id }}" required>
        </div>

        <div class="form-group">
            <label for="produto">Produto</label>
            <input type="text" class="form-control" id="produto" name="produto" value="{{ $compra->produto }}" required>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="{{ $compra->valor }}" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $compra->quantidade }}" required>
        </div>

        <div class="form-group">
            <label for="data_compra">Data da Compra</label>
            <input type="date" class="form-control" id="data_compra" name="data_compra" value="{{ $compra->data_compra->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
