@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-dark-subtle text-dark-emphasis">
                <h3 class="mb-0">Detalhes do Autor</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $author->id }}</li>
                    <li class="list-group-item"><strong>Nome:</strong> {{ $author->name }}</li>
                    <li class="list-group-item"><strong>Estado:</strong> {{ $author->state }}</li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
@endsection
