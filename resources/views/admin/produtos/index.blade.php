@extends('layout.app')

@section('content')
<div class="container">
    <h2>Produtos</h2>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ $produto->preco }}</td>
                    <td>
                        @if($produto->imagem)
                            <img src="{{ asset('images/' . $produto->imagem) }}" alt="Imagem do produto" style="max-width: 100px;">
                        @else
                            Sem imagem
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $produtos->links('vendor.pagination.numeric') }}
</div>

<script>
    function confirmDelete() {
        return confirm('Tem certeza de que deseja excluir este item?');
    }
</script>
@endsection
