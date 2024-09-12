@extends('layout.app')

@section('content')
<div class="container">
    <h2>Lista de Compras</h2>

    <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3">Nova Compra</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Data da Compra</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
            <tr>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->produto }}</td>
                <td>{{ $compra->quantidade }}</td>
                <td>{{ $compra->total }}</td>
                <td>{{ $compra->data_compra }}</td>
                <td>
                    <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $compras->links() }}
</div>
@endsection
