@extends('layout.app')

@section('content')
<div class="container">
    <h1>Lista de Vendas</h1>
    <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">Registrar Nova Venda</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Data da Venda</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{ $venda->produto }}</td>
                    <td>R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
                    <td>{{ $venda->quantidade }}</td>
                    <td>{{ $venda->data_venda }}</td>
                    <td>
                        <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vendas->links('vendor.pagination.numeric') }}
</div>
@endsection
