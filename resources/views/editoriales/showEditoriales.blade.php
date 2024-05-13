<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>info editoriales</title>
</head>
<x-navbar>
</x-navbar>
<body>
    <h1>Editorial id{{ $editorial -> id }}</h1>
    <ul>
        <li>Nombre: {{ $editorial->nombre }}</li>
        <li>Correo: {{ $editorial->correo }}</li>
        <li>Comentario: {{ $editorial->comentario }}</li>
        <li>Ciudad {{ $editorial->ciudad }}</li>
    </ul>
</body>
</html>