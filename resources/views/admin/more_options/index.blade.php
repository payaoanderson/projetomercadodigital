@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Mais Opções</h2>

    @include('more_options.partials.flash')

    <a href="{{ route('more_options.create') }}" class="btn btn-primary mb-3">Adicionar Opção</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moreOptions as $moreOption)
                        <tr>
                            <td>{{ $moreOption->title }}</td>
                            <td>
                                <a href="{{ route('more_options.edit', $moreOption->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('more_options.destroy', $moreOption->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
