@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-light p-4 rounded-lg shadow-lg border border-secondary-subtle">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-dark">👤 Detalhes do Autor</h2>
                <a href="{{ route('authors.index') }}" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th class="text-secondary">ID:</th>
                        <td><span class="badge bg-dark text-white">{{ $author->id }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Nome:</th>
                        <td class="fw-semibold text-dark">{{ $author->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-secondary">Estado:</th>
                        <td class="text-dark">{{ $author->state }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
