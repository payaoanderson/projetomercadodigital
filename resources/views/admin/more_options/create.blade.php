@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Adicionar Nova Opção</h2>

    @include('more_options.partials.flash')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('more_options.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Conteúdo</label>
                    <textarea class="form-control" id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('more_options.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
