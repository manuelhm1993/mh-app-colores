<?php
include_once "database/colores_crud.php";

$colores = $selectColores();

if(is_array($colores)) {
    // ---------------- Manipular el resulset
    foreach ($colores as $color) {
        echo "
        id:          {$color["id"]}<br>
        titulo:      {$color["titulo"]}<br>
        descripcion: {$color["descripcion"]}<br>
        ";
    }
}
else {
    echo $colores;
}
