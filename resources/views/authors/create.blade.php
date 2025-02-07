@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-black text-white">
                <h3 class="mb-0">Adicionar Autor</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">Estado:</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
