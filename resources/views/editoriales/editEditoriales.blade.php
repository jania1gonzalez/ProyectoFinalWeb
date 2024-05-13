<!DOCTYPE html>
<html lang="en">
    <head>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editoriales - Mi Sitio Web</title>
        <link rel="stylesheet" href="estilos.css">
            <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bd">
        <form action="{{ route('editorial.update', $editorial) }}" method="POST" action="/editorial">
        @csrf
        @method('PATCH')
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<x-navbar>
</x-navbar>

    @include('parciales.formError')

        <h1>Editoriales</h1>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old ('nombre')}}" required>

            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <label for="domicilio">Domicilio:</label>
            <input type="domicilio" id="domicilio" name="domicilio" value="{{ old ('domicilio')}}" required>

            @error('domicilio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" value="{{ old ('comentario')}}" required></textarea>   
            @error('comentario')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="telefono">telefono:</label>
            <textarea id="telefono" name="telefono" rows="4" value="{{ old ('telefono')}}" required></textarea>
            @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit">Actualizar</button>
        </form>
    
        <div class="footer">
            <h2>Contáctame en...</h2>
            <a href="jania.gonzalez5631@alumnos.udg.mx">jania.gonzalez5631@alumnos</a>
        </div>
        
    
    </body>
    </html>
    </html>
</html>
