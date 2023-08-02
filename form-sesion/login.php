<?php
session_start();

require_once "../config/variables-conexion.php";
require_once "../database/globals.php";
require_once "../database/usuarios.php";

$request = [
    "nombre_usuario" => $_POST["nombre_usuario"],
    "contrasena" => $_POST["contrasena"]
];

$result = $validarNombreUsuario($request["nombre_usuario"]);

// ---------------- Matar la ejecución si el usuario no existe
if(!$result) {
    echo "<h1>¡Error! El usuario no existe</h1>";
    die();
}

// ---------------- Verificar la contraseña en caso de que el usuario exista
if(password_verify($request["contrasena"], $result["contrasena"])) {
    $_SESSION["admin"] = $request["nombre_usuario"];

    header("Location: middleware.php");
}

echo "<h1>¡Error! Contraseña inválida</h1>";