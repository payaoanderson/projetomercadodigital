@extends('layout.app')

@section('content')
<div class="container">
    <h2>Criar Produto</h2>
    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" class="form-control" name="preco" required>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control" name="imagem">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
