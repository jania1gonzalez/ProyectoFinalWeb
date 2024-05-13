<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informacion</title>
</head>
<x-navbar>
</x-navbar>
<body>
    <dir>
        <a href = "/formulario">Formulario</a>
    <dir>
        <hr>
        {{tipo}}
        @if ($tipo == 'alumnos')
            <h2>Alumnos</h2>
            <p>informacion de alumnos </p>
        @elseif ($tipo =='empresa')
            <h2>empresa</h2>
        @else
            <h2>visitantes</h2>
        @endif
    </hr>
    <h1>informacion</h1>
    <p>esta informacion es de la pagina</p> 
</body>
</html>