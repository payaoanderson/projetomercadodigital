@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Relatório</h2>

    <form action="{{ route('relatorios.update', $relatorio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $relatorio->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ old('descricao', $relatorio->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_relatorio" class="form-label">Data do Relatório</label>
            <input type="date" class="form-control" id="data_relatorio" name="data_relatorio" 
                value="{{ old('data_relatorio', is_a($relatorio->data_relatorio, \DateTime::class) ? $relatorio->data_relatorio->format('Y-m-d') : $relatorio->data_relatorio) }}" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Relatório</button>
    </form>
</div>
@endsection
