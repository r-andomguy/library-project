@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('books.index') }}" class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                   style="width: 40px; height: 40px;">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="fw-bold text-dark m-0">📘 Detalhes do Livro</h2>
            </div>
            @if ($book->cover)
                <div class="text-center mb-4">
                    @if ($book->cover)
                        <img src="{{ asset('storage/covers/' . $book->cover) }}" alt="Capa do livro {{ $book->title }}" class="img-fluid mt-2" style="max-width: 200px; height: auto;">
                    @else
                        <p class="text-muted">Sem capa disponível</p>
                    @endif
                </div>
            @endif
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-light p-3 border-dark">
                    <strong class="text-dark">ID:</strong> {{ $book->id }}
                </li>
                <li class="list-group-item bg-light p-3 border-dark">
                    <strong class="text-dark">Título:</strong> {{ $book->title }}
                </li>
                <li class="list-group-item bg-light p-3 border-dark">
                    <strong class="text-dark">Autor:</strong> {{ $book->author->name }}
                </li>
                <li class="list-group-item bg-light p-3 border-dark">
                    <strong class="text-dark">Data de Publicação:</strong> {{ $book->publishDate->format('Y-m-d') }}
                </li>
                <li class="list-group-item bg-light p-3 border-dark">
                    <strong class="text-dark">Descrição:</strong> {{ $book->description }}
                </li>
            </ul>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary mt-4">Voltar</a>
        </div>
    </div>
@endsection
