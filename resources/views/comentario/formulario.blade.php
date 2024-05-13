<!DOCTYPE html>
<html lang="en">
    <head>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto - Mi Sitio Web</title>
        <link rel="stylesheet" href="estilos.css">
            <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bd">
        <form method="POST" action="/contacto">
        @csrf
        <x-navbar>
        </x-navbar>


    @include('parciales.formError')

        <h1>Contacto</h1>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old ('nombre')}}" required>

            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="{{ old ('correo')}}" required>

            @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <label>Género:</label>
            <input type="radio" id="genero-masculino" name="genero" value="masculino" required>
            <label for="genero-masculino">Masculino</label>
            <input type="radio" id="genero-femenino" name="genero" value="femenino" required>
            <label for="genero-femenino">Femenino</label>
    
            <label for="contrasenia">Contraseña:</label>
            <input type="password" id="contrasenia" name="contrasenia" required>
    
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" value="{{ old ('comentario')}}" required></textarea>   
            @error('comentario')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="ciudad">Ciudad:</label>
            <select id="ciudad" name="ciudad">
                <option value="guadalajara">Guadalajara</option>
                <option value="zapopan">Zapopan</option>
                <option value="tonala">Tonalá</option>
                <option value="otra">Otra</option>
            </select>
    
            <label>
                <input type="checkbox" name="interesado" value="si">
                Me interesa contratarte
            </label>
    
            <button type="submit">Enviar</button>
        </form>
    
        <div class="footer">
            <h2>Contáctame en...</h2>
            <a href="jania.gonzalez5631@alumnos.udg.mx">jania.gonzalez5631@alumnos</a>
        </div>
        
    
    </body>
    </html>
    </html>
</html>
