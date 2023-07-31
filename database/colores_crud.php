<?php
// ---------------- Obtener la ruta absoluta del directorio padre con la ruta del directorio actual
$rutaWindows = dirname(getcwd(), 1);

// ---------------- Reemplazar las barras invertidas de windows por los slash de unix
$rutaUnix = str_replace("\\", "/", $rutaWindows);

require_once "{$rutaUnix}/config/variables-conexion.php";
require_once "globals.php";
require_once "colores.php";

var_dump($selectColores());

// ---------------- Llamar al Create y retornar a la página anterior
if($_POST) {
    $result = $createColores();

    // ---------------- Establece el código de respuesta para manejar los feedbacks
    http_response_code((strcmp($result, "200") === 0) ? 200 : 404);

    header("location: ../index.php");
}
