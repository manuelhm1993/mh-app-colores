<?php
require_once "../config/variables-conexion.php";
require_once "../database/globals.php";
require_once "../database/usuarios.php";

if($_POST) {
    // --------- Crear un array para la consulta preparada y encriptar la clave del usuario
    $request = [
        "usuario"     => $_POST["nombre_usuario"],
        "contrasena"  => password_hash($_POST["contrasena"], PASSWORD_BCRYPT) 
    ];

    // --------- Almacenar la clave de confirmación para comprobar que coinciden
    $contrasena_verificacion = $_POST["contrasena2"];

    $result = $validarNombreUsuario($request["usuario"]);

    if(!$result) {
        // --------- Comprobar que las contraseñas coinciden
        if(password_verify($contrasena_verificacion, $request["contrasena"])) {
            $crearUsuario($request);
            header('Location: ../index.php');
        }
        else {
            header('Location: registro.php');
        }
    }
    else {
        echo "<h1>Este usuario ya existe</h1>";
        die();
    }
}
else {
    echo "<h1>No autorizado</h1>";
    die();
}