@extends('layout.app')

@section('content')
<div class="container">
    <h2>Criar Novo Relatório</h2>

    <form action="{{ route('relatorios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_relatorio" class="form-label">Data do Relatório</label>
            <input type="date" class="form-control" id="data_relatorio" name="data_relatorio" value="{{ old('data_relatorio') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Relatório</button>
    </form>
</div>
@endsection
