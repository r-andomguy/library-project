@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Autor</h1>

        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">Estado:</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ $author->state }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
