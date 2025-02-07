@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="mb-4">Bem-vindo à Biblioteca Inovcorp</h1>
        <p class="mb-5">Gerencie seus livros e autores de forma fácil e rápida.</p>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded h-100">
                    <a href="{{ route('books.index') }}">
                        <img src="{{ asset('images/books.jpeg') }}" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="Livros">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Sessão de Livros</h5>
                        <div class="mt-auto">
                            <a href="{{ route('books.index') }}" class="btn btn-primary w-100">Cadastrar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded h-100">
                    <a href="{{ route('authors.index') }}">
                        <img src="{{ asset('images/authors.jpg') }}" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;" alt="Autores">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Sessão de Autores</h5>
                        <div class="mt-auto">
                            <a href="{{ route('authors.index') }}" class="btn btn-secondary w-100">Cadastrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
