@extends('layout.app')

@section('content')
<div class="container">
    <h2>Relatórios</h2>
    <a href="{{ route('relatorios.create') }}" class="btn btn-primary mb-3">Criar Novo Relatório</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data do Relatório</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
                <tr>
                    <td>{{ $relatorio->id }}</td>
                    <td>{{ $relatorio->titulo }}</td>
                    <td>{{ $relatorio->descricao }}</td>
                    <td>
                        @if($relatorio->data_relatorio instanceof \DateTime)
                            {{ $relatorio->data_relatorio->format('d/m/Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($relatorio->data_relatorio)->format('d/m/Y') }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('relatorios.edit', $relatorio->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('relatorios.destroy', $relatorio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $relatorios->links('vendor.pagination.numeric') }}
</div>
@endsection
