@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <h2 class="fw-bold text-primary">📘 Detalhes do Livro</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>ID:</strong> {{ $book->id }}</li>
                <li class="list-group-item"><strong>Título:</strong> {{ $book->title }}</li>
                <li class="list-group-item"><strong>Autor:</strong> {{ $book->author->name }}</li>
                <li class="list-group-item"><strong>Data de Publicação:</strong> {{ $book->publishDate->format('Y-m-d') }}</li>
                <li class="list-group-item"><strong>Descrição:</strong> {{ $book->description }}</li>
            </ul>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary mt-3">Voltar</a>
        </div>
    </div>
@endsection
