<!DOCTYPE html>
<html lang="en">
    <head>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>libro - Mi Sitio Web</title>
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bd">
        <form action="{{ route('libro.update', $libro) }}" method="POST" action="/libro" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-navbar>
        </x-navbar>

        
    @include('parciales.formError')

    <img src="{{ asset($libro->imagen) }}" alt="{{ $libro->imagen }}"> 
        <h1>libro</h1>
        

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $libro->nombre }}" value="{{ old ('nombre') }}"required>
    
            <label for="editorial_id">Id de la editorial:</label>
            <input type="number" id="editorial_id" name="editorial_id" value="{{ $libro->editorial_id }}" value="{{ old ('editorial_id')}}" required>
    
            <label for="unidades_fisicas">Unidades fisicas:</label>
            <input type="number" id="unidades_fisicas" name="unidades_fisicas" value="{{ $libro->unidades_fisicas }}" value="{{ old ('unidades_fisicas')}}" required>
    
            <label for="sinopsis">Sinopsis:</label>
            <textarea id="sinopsis" name="sinopsis" rows="4" required>{{ old('sinopsis') }}</textarea>

            <label for="genero">Genero:</label>
            <select id="genero" name="genero">
                <option value="terror" @selected($libro->genero == 'terror')>Terror</option>
                <option value="misterio" @selected($libro->genero == 'misterio')>Misterio</option>
                <option value="magia" @selected($libro->genero == 'magia')>Magia</option>
                <option value="accion" @selected($libro->genero == 'accion')>Accion</option>
                <option value="otra">Otra</option>
            </select>
    
            <label>
                <input type="checkbox" name="virtual" value="True">
                ¿Con formato virtual?
            </label>

            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen">
    
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