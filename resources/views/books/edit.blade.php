@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('books.index') }}" class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                   style="width: 40px; height: 40px;">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="fw-bold text-dark m-0">✏️ Editar Livro</h2>
            </div>

            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="form-label fw-bold">Título</label>
                    <input type="text"
                           class="form-control p-3 rounded-lg shadow-sm border-dark focus:ring focus:ring-dark"
                           id="title" name="title" value="{{ $book->title }}" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="form-label fw-bold">Autor</label>
                    <select class="form-control p-3 rounded-lg shadow-sm border-dark focus:ring focus:ring-dark"
                            id="author" name="author" required style="appearance: none; background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 20 20\' fill=\'%23000000\'><path d=\'M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z\' /></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1rem;">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="publication_date" class="form-label fw-bold">Data de Publicação</label>
                    <input type="date"
                           class="form-control p-3 rounded-lg shadow-sm border-dark focus:ring focus:ring-dark"
                           id="publication_date" name="publication_date"
                           value="{{ $book->publishDate->format('Y-m-d') }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label fw-bold">Descrição</label>
                    <textarea class="form-control p-3 rounded-lg shadow-sm border-dark focus:ring focus:ring-dark"
                              id="description" name="description" rows="4" required>{{ $book->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="cover" class="form-label fw-bold">Imagem da Capa</label>
                    <input type="file"
                           class="form-control p-3 rounded-lg shadow-sm border-dark focus:ring focus:ring-dark"
                           id="cover" name="cover" accept="image/jpg, image/png">
                    <small class="form-text text-muted">Apenas arquivos JPG e PNG com no máximo 2MB.</small>
                </div>
                @if ($book->cover)
                    <div class="mb-4">
                        <label class="form-label fw-bold">Capa Atual:</label>
                        <div>
                            <img src="{{ asset('storage/covers/' . $book->cover) }}"
                                 alt="Capa do livro"
                                 class="rounded-lg shadow-sm"
                                 style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                @endif
                <button type="submit" class="btn btn-dark px-4 py-2 fw-bold">Atualizar</button>
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary px-4 py-2">Cancelar</a>
            </form>
            @if ($errors->has('cover'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('cover') }}
                </div>
            @endif
        </div>
    </div>
@endsection
