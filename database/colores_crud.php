<?php
// ---------------- Para retroceder una carpeta se usa ./ pero si se invoca un verbo HTTP se usa ../
$puntos = ($_POST) ? "../" : "./";

include_once "{$puntos}config/variables-conexion.php";
include_once "globals.php";

// ---------------- Recibe un request para ingresar un nuetro registro en la tabla colores - CREATE
$createColores = function() use ($link, $user, $password, $cerrarConexiones) {
    $request = [
        ":titulo"      => $_POST["titulo"],
        ":descripcion" => $_POST["descripcion"]
    ];

    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "INSERT INTO colores (titulo, descripcion) VALUES (:titulo, :descripcion)";

        $stm = $pdo->prepare($sql);

        $result = $stm->execute($request);
    } 
    catch (PDOException $e) {
        $result = "¡Error!: {$e->getMessage()}<br/>";
    }
    finally {
        $cerrarConexiones($pdo, $stm);
    }
};

// ---------------- Devuelve un array asociativo con todos los registros de la tabla colores - READ
$selectColores = function() use ($link, $user, $password, $cerrarConexiones) {
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
    } 
    // ---------------- Control de errores
    catch (PDOException $e) {
        // ---------------- Dar un mensaje de respuesta y cerrar la conexión
        $result = "¡Error!: {$e->getMessage()}<br/>";

        // ---------------- Termina con el script actual
        // die();
    }
    finally {
        // ---------------- Cerrar las conexiones a la BBDD
        $cerrarConexiones($pdo, $stm);
    }

    // ---------------- Retornar el resultado
    return $result;
};

// ---------------- Llamar al Create y retornar a la página anterior
if($puntos === "../") {
    $createColores();
    header("location:../index.php");
}
