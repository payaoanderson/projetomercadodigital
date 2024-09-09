@extends('layout.app')

@section('content')
<div class="container">
    <h2>Lista de Compras</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Compra</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Produto</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Data da Compra</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
            <tr>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->user->name }}</td>
                <td>{{ $compra->produto }}</td>
                <td>{{ $compra->valor }}</td>
                <td>{{ $compra->quantidade }}</td>
                <td>{{ $compra->data_compra->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $compras->links('vendor.pagination.numeric') }}
</div>
@endsection
