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
    <h1>Listado de Editoriales</h1>

    <table class="table table-striped table-bordered" border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Domicilio</th>
                <th>Fecha</th>
                <th>telefono</th>
                <th>Acciones</th>
                

            </tr>
        </thead>
        <tbody>
            @foreach ($editoriales as $editoriales)
            <tr>
                <td>{{ $editoriales->nombre }}</td>
                <td>{{ $editoriales->domicilio }}</td>
                <td>{{ $editoriales->created_at }}</td>
                <td>{{ $editoriales->telefono }}</td>

                <td>
                    <nav>
                        <div class="d-grid">
                            <a class="btn btn-outline-info" href="{{ route('editorial.show', $editoriales) }}">Ver </a>
                        </div>
                        <div class="d-grid">
                            <a class="btn btn-outline-info" href="{{ route('editorial.edit', $editoriales) }}">Edit</a>
                        </div>
                    </nav>
                    <form action=" {{ route('editorial.destroy', $editoriales) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="d-grid">
                        <input class="btn btn-danger" type="submit" value="Eliminar">
                        </div>
                    </form>
                </td>
            </tr>           

            @endforeach
        </tbody>
    </table>
</body>
</html>