@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-light p-4 rounded-lg shadow-lg border border-secondary-subtle">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-dark">📝 Adicionar Autor</h2>
                <a href="{{ route('authors.index') }}" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <form action="{{ route('authors.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-dark fw-semibold">Nome:</label>
                    <input type="text" class="form-control form-control-lg border-dark" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label text-dark fw-semibold">Estado:</label>
                    <input type="text" class="form-control form-control-lg border-dark" id="state" name="state" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('authors.index') }}" class="btn btn-outline-dark me-2">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
