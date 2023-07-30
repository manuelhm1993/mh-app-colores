<?php
include "config/variables-conexion.php";

try {
    // ---------------- Crear una instancia de PDO y conectar con la BBDD
    $pdo = new PDO($link, $user, $password);

    // ---------------- Hacer una consulta a la tabla colores
    $sql = "SELECT * FROM colores";

    // ---------------- Preparar la consulta
    $stm = $pdo->prepare($sql);

    // ---------------- Ejecutar la consulta
    $stm->execute();

    // ---------------- Obtener el resulset
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    // ---------------- Manipular el resulset
    foreach ($result as $color) {
        echo "
        id:          {$color["id"]}<br>
        titulo:      {$color["titulo"]}<br>
        descripcion: {$color["descripcion"]}<br>
        ";
    }

    // ---------------- Destruir la conexión y el stm
    $stm = null;
    $pdo = null;
} 
// ---------------- Control de errores
catch (PDOException $e) {
    // ---------------- Dar un mensaje de respuesta y cerrar la conexión
    echo "¡Error!: {$e->getMessage()}<br/>";
    die();
}

// ---------------- Si es un documento php puro, se puede omitir la etiqueta de cierre
