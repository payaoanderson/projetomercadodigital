@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Compra</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('compras.update', $compra->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="produto" class="form-label">Produto</label>
            <select class="form-control" id="produto" name="produto" required>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->nome }}" {{ $compra->produto_id == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $compra->quantidade }}" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ $compra->preco }}" required>
        </div>

        <div class="mb-3">
            <label for="data_compra" class="form-label">Data da Compra</label>
            <input type="date" class="form-control" id="data_compra" name="data_compra" value="{{ $compra->data_compra }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
