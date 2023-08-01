<?php
require_once "../config/variables-conexion.php";
require_once "../database/globals.php";
require_once "../database/usuarios.php";

// --------- Crear un array para la consulta preparada y encriptar la clave del usuario
$request = [
    "usuario"     => $_POST["nombre_usuario"],
    "contrasena"  => password_hash($_POST["contrasena"], PASSWORD_BCRYPT) 
];

// --------- Almacenar la clave de confirmación para comprobar que coinciden
$contrasena_verificacion = $_POST["contrasena2"];

// --------- La etiqueta <pre></pre> formatea el dontenido de su interior
echo "<pre>";
var_dump($request);
var_dump($contrasena_verificacion);
echo "</pre>";

// --------- Comprobar que las contraseñas coinciden
if(password_verify($contrasena_verificacion, $request["contrasena"])) {
    $crearUsuario($request);
    header('Location: ../index.php');
}
else {
    header('Location: registro.php');
}
