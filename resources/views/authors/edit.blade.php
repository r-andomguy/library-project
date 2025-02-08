@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="bg-light p-4 rounded-lg shadow-lg border border-secondary-subtle">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-dark">✏️ Editar Autor</h2>
                <a href="{{ route('authors.index') }}" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>

            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label text-dark fw-semibold">Nome:</label>
                    <input type="text" class="form-control form-control-lg border-dark" id="name" name="name" value="{{ $author->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label text-dark fw-semibold">Estado:</label>
                    <input type="text" class="form-control form-control-lg border-dark" id="state" name="state" value="{{ $author->state }}" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-save"></i> Atualizar
                    </button>
                    <a href="{{ route('authors.index') }}" class="btn btn-outline-dark">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
