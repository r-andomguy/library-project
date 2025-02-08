@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h2 class="fw-bold text-primary">✏️ Editar Livro</h2>
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Autor</label>
                    <select class="form-control" id="author" name="author" required>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="publication_date" class="form-label">Data de Publicação</label>
                    <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $book->publishDate->format('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $book->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
