<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver alumno</title>
</head>
<body>
    <h1>Alumno # {{ $alumno->id }}</h1>

    <ul>
        <li>Nombre: {{ $alumno->nombre }}</li>
        <li>Correo: {{ $alumno->correo }}</li>
        <li>Fecha de Nacimiento: {{ $alumno->FNacimiento }}</li>
        <li>Ciudad: {{ $alumno->Ciudad }}</li>
    </ul>

    <hr>


        <form action="{{ route('alumnos.destroy', $alumno)}}"method="POST">

        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>

        </form>


    <hr>
    <a href="{{ route('alumnos.edit', $alumno) }}">Editar</a>
    <br>
    <br>
    <a href="{{ route('alumnos.index') }}">Lista</a>
</body>
</html>