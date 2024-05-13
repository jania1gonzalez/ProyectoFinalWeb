<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contacto - Mi Sitio Web</title>
<link rel="stylesheet" href="estilos.css">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bd">
<form action="{{ route('comentario.update', $comentario) }}" method="POST" action="/contacto">
@csrf
@method('PATCH')
<div class="nav">
    <a href="../../index.php">Inicio</a>
    <a href="{{ route('comentario.create') }}">Formulario</a>
    <a href="{{ route('comentario.index') }}">Listado Formulario</a>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Index</a>
    </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  href="{{ route('libro.index') }}" role="button" data-bs-toggle="dropdown">Libros</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('libro.index') }}">Index Libro</a></li>
                <li><a class="dropdown-item" href="{{ route('libro.create') }}">Crear Libro</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('editorial.index') }}" role="button" data-bs-toggle="dropdown">Editoriales</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('editorial.index') }}">Index Editorial</a></li>
                <li><a class="dropdown-item" href="{{ route('editorial.create') }}">Crear Editorial</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('comentario.index') }}" role="button" data-bs-toggle="dropdown">Comentarios</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('comentario.index') }}">Index Comentario</a></li>
                <li><a class="dropdown-item" href="{{ route('comentario.create') }}">Crear Comentario</a></li
            </ul>
        </li>
    </ul>
</div>
</div>
</nav>

//Validacion
@include('parciales.formError')