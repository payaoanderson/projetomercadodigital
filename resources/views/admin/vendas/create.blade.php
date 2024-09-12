@extends('layout.app')

@section('content')
<div class="container">
    <h2>Criar Nova Venda</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vendas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select class="form-control" id="produto_id" name="produto_id" required>
                <option value="">Selecione um produto</option>
                
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" step="0.01" class="form-control" id="total" name="total" required>
        </div>

        <div class="mb-3">
            <label for="data_venda" class="form-label">Data da Venda</label>
            <input type="date" class="form-control" id="data_venda" name="data_venda" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Venda</button>
    </form>
</div>
@endsection
