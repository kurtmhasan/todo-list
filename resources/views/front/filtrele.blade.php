@extends('layouts.app')
@section('filtre')
    <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Görev Listesi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-list li, .task-list li {
            margin-bottom: 10px;
        }
        .category-list a, .task-list a {
            text-decoration: none;
        }
        .category-list a:hover, .task-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Görev Listesi</h1>
    <div class="mb-4">
        <h3>Görevler</h3>
        <ul class="list-group task-list">
            @forelse($tasks as $task)
                <li class="list-group-item">
                    <strong>{{ $task->gorevAdi }}</strong> -
                    <span class="text-secondary">Kategori: {{ $task->kategori_getir->kategori }}</span>
                </li>
            @empty
                <li class="list-group-item">Görev bulunamadı.</li>
            @endforelse
        </ul>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@endsection
