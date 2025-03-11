<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Alumnos</title>
</head>
<body>
    <h1>Lista de Alumnos</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th>Ciudad</th>
        </tr>

        @foreach ($alumnos as $alumn)
            <tr>
                <td>
                    <a href="{{ route('alumnos.show', $alumn->id) }}">{{ $alumn->id }}</a>
                </td>
                <td>{{ $alumn->nombre }}</td>
                <td>{{ $alumn->correo }}</td>
                <td>{{ $alumn->FNacimiento }}</td>
                <td>{{ $alumn->Ciudad }}</td>
                <td>
                    <a href="{{ route('alumnos.edit', $alumn) }}">Editar</a>
                </td>
            </tr>
        @endforeach

    </table>
    <a href="{{ route('alumnos.create') }}">Agregar</a>

</body>
</html>