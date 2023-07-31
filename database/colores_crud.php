<?php
// ---------------- Para retroceder una carpeta se usa ./ pero si se invoca un verbo HTTP se usa ../
$puntos = ($_POST) ? "../" : "./";

require_once "{$puntos}config/variables-conexion.php";
require_once "globals.php";
require_once "colores.php";

// ---------------- Llamar al Create y retornar a la página anterior
if($puntos === "../" && !isset($_POST["eliminar-todo"])) {
    $result = $createColores();

    // ---------------- Establece el código de respuesta para manejar los feedbacks
    http_response_code((strcmp($result, "200") === 0) ? 200 : 404);

    header("location: ../index.php");
}

// ---------------- Elimina un registro específico
if(isset($_POST["eliminar"])) {
    $eliminarColor();

    header("location: ../index.php");
}

// ---------------- Elimina todos los registros
if(isset($_POST["eliminar-todo"])) {
    $eliminarColores();

    header("location: ../index.php");
}
