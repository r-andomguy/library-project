@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded-lg shadow-lg">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-primary">📚 Lista de Autores</h2>
                <a href="{{ route('authors.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Adicionar Autor
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Estado</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody class="bg-dark-subtle">
                    @foreach ($authors as $author)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $author->id }}</span></td>
                            <td class="fw-semibold">{{ $author->name }}</td>
                            <td>{{ $author->state }}</td>
                            <td class="text-center">
                                <a href="{{ route('authors.show', $author->id) }}" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
