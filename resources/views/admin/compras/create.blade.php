@extends('layout.app')

@section('content')
<div class="container">
    <h2>Nova Compra</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="produto" class="form-label">Produto</label>
            <select class="form-control" id="produto" name="produto" required>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->nome }}">
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Total</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ old('total') }}" required>
        </div>

        <div class="mb-3">
            <label for="data_compra" class="form-label">Data da Compra</label>
            <input type="date" class="form-control" id="data_compra" name="data_compra" value="{{ old('data_compra') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
