<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gerenciamento de Autores')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .navbar-brand {
            font-weight: bold;
        }
        footer {
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('authors.index') }}">Biblioteca Inovcorp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Início</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4 content">
    @yield('content')
</div>

<footer class="mt-4">
    <div class="container">
        &copy; {{ date('Y') }} Biblioteca Inovcorp. Todos os direitos reservados.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
