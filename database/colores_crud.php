<?php
// ---------------- Para retroceder una carpeta se usa ./ pero si se invoca un verbo HTTP se usa ../
$puntos = ($_POST) ? "../" : "./";

require_once "{$puntos}config/variables-conexion.php";
require_once "globals.php";
require_once "colores.php";

// ---------------- Llamar al Create y retornar a la página anterior
if($puntos === "../") {
    $result = $createColores();

    $response = (strcmp($result, "200") === 0) ? "?response=200" : "?response=404";

    header("location: ../index.php{$response}");
    //echo $_SERVER['PHP_SELF'];
    //echo $_SERVER['HTTP_REFERER'];

}
