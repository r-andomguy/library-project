@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h2 class="fw-bold text-primary">📖 Adicionar Livro</h2>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Autor</label>
                    <select class="form-control" id="author" name="author" required>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="publishDate" class="form-label">Data de Publicação</label>
                    <input type="date" class="form-control" id="publishDate" name="publishDate" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
