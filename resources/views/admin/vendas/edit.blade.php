@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Venda</h2>

    <form action="{{ route('vendas.update', $venda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select class="form-control" id="produto_id" name="produto_id" required>
                <option value="">Selecione um produto</option>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ $venda->produto_id == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade', $venda->quantidade) }}" required>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" name="total" value="{{ old('total', $venda->total) }}" required>
        </div>
        <div class="mb-3">
            <label for="data_venda" class="form-label">Data da Venda</label>
            <input type="date" class="form-control" id="data_venda" name="data_venda" 
                value="{{ old('data_venda', is_object($venda->data_venda) ? $venda->data_venda->format('Y-m-d') : $venda->data_venda) }}" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Venda</button>
    </form>
</div>
@endsection
