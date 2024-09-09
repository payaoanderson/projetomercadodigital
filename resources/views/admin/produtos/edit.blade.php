@extends('layout.app')

@section('content')
<div class="container">
    <h2>Editar Produto</h2>
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" class="form-control" name="preco" value="{{ $produto->preco }}" required>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control" name="imagem">
        </div>

        @if($produto->imagem)
            <div>
                <img src="{{ asset('images/' . $produto->imagem) }}" alt="Imagem do produto" style="max-width: 100px;">
            </div>
        @endif

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection

