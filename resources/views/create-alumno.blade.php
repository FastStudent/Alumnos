<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Alumnos</title>
</head>
<body>
    <form action="/alumnos" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <br>
        <label for="correo">Correo</label>
        <input type="email" name="correo">
        <br>
        <label for="FNacimiento">Fecha de nacimiento</label>
        <input type="text" name="FNacimiento">
        <br>
        
        <label for="Ciudad">Ciudad</label>
        <input type="text" name="Ciudad">
        <br>
        <button type="submit">
            Enviar
        </button>
    </form>
</body>
</html>