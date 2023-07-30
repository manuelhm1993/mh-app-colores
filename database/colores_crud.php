<?php
// ---------------- Para retroceder una carpeta se usa ./ pero si se invoca un verbo HTTP se usa ../
$puntos = ($_POST) ? "../" : "./";

require_once "{$puntos}config/variables-conexion.php";
require_once "globals.php";
require_once "colores.php";

// ---------------- Llamar al Create y retornar a la página anterior
if($puntos === "../") {
    $createColores();
    header("location:../index.php");
}
