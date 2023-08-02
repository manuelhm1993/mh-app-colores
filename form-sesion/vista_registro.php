<?php
$vista_registro = [
    "html" => '
    <h2>Registro de usuario</h2>

    <form action="agregar_usuario.php" method="post">
        <input type="text" name="nombre_usuario" placeholder="Ingrese su usuario">
        <input type="password" name="contrasena" placeholder="Ingrese su contraseña">
        <input type="password" name="contrasena2" placeholder="Confirme su contraseña">

        <button type="submit">Crear cuenta</button>
    </form>
    ',
    "titulo" => "Registro"
];
