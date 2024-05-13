<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>info libros</title>
</head>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<x-navbar>
</x-navbar>
<body>
    <h1>Libros Id {{ $libro -> id }} </h1>
    <ul>
        <li>Nombre: {{ $libro->nombre }}</li>
        <li>Editorial Id: {{ $libro->editorial_id }}</li>
        <li>Unidades: fisicas: {{ $libro->unidades_fisicas }}</li>
        <li>Sinopsis: {{ $libro->sinopsis }}</li>
        <li>Genero: {{ $libro->genero }}</li>
        <li>Virtual: {{ $libro->virtual }}</li>
        <img src="{{ asset($libro->imagen) }}" alt="{{ $libro->imagen }}">
    </ul>
</body>    
</html>