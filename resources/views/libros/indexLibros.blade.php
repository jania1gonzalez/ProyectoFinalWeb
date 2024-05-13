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
    <title>Listado</title>
</head>
<body>

    <x-navbar>
    </x-navbar>

    <h1>Listado de libros</h1>

    <table class="table table-striped table-bordered" border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Sinopsis</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->nombre }}</td>
                <td>{{ $libro->sinopsis }}</td>
                <td>{{ $libro->created_at }}</td> 
                <td><img src="{{$libro->imagen}}" alt="{{ $libro->imagen }}"> </td> 
                <td>
                    <nav >
                        <div class="d-grid">
                            <a class="btn btn-outline-info" href="{{ route('libro.show', $libro) }}">Ver </a>
                        </div>
                        <div class="d-grid">
                            <a class="btn btn-outline-info" href="{{ route('libro.edit', $libro) }}">Edit</a>
                        </div>
                        <form action="{{ route('libro.descargar', $libro) }}" method="POST">
                            @csrf
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Descar imagen</button>
                            </div>
                        </form>
                    </nav>
                    <form action=" {{ route('libro.destroy', $libro) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="d-grid">
                        <input class="btn btn-danger" type="submit" value="Eliminar" >  
                        </div>
                    </form>
                    
                </td>
            </tr>           

            @endforeach
        </tbody>
    </table>
</body>
<!--<img src="assets\images\libros\libro.png" alt="si sale el texto no se llama a la imagen">-->
</html>