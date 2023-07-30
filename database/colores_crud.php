<?php
// ---------------- Para retroceder una carpeta se usa ./
include_once './config/variables-conexion.php';

// ---------------- Devuelve un array asociativo con todos los registros de la tabla colores
$selectColores = function() use ($link, $user, $password) {
    $result = null;

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

        // ---------------- Destruir las conexiones abiertas
        $stm = null;
        $pdo = null;
    } 
    // ---------------- Control de errores
    catch (PDOException $e) {
        // ---------------- Dar un mensaje de respuesta y cerrar la conexión
        $result = "¡Error!: {$e->getMessage()}<br/>";

        // ---------------- Destruir las conexiones abiertas
        $stm = null;
        $pdo = null;

        // ---------------- Termina con el script actual
        // die();
    }

    // ---------------- Retornar el resultado
    return $result;
};
