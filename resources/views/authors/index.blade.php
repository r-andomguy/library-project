@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-dark-subtle text-dark-emphasis d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Lista de Autores</h3>
                <a href="{{ route('authors.create') }}" class="btn btn-light btn-sm">+ Adicionar Autor</a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-responsive-md">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Estado</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->state }}</td>
                                <td class="text-center">
                                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm text-white">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
