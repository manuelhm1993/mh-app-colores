<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de usuario</h1>

    <form action="agregar_usuario.php" method="post">
        <input type="text" name="nombre_usuario" placeholder="Ingrese su usuario">
        <input type="text" name="contrasena" placeholder="Ingrese su contraseña">
        <input type="text" name="contrasena2" placeholder="Confirme su contraseña">

        <button type="submit">Guardar</button>
    </form>
</body>
</html>