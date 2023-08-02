<?php
$vista_login = [
    "html" => '
    <h2>Login</h2>

    <form action="login.php" method="post">
        <input type="text" name="nombre_usuario" placeholder="Ingrese su usuario">
        <input type="password" name="contrasena" placeholder="Ingrese su contraseña">

        <button type="submit">Iniciar sesión</button>
    </form>
    ',
    "titulo" => "Login"
];
