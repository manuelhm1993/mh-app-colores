<?php
// ---------------- Crea un nuevo registro en la tabla colores - CREATE
$crearUsuario = function($request) use ($link, $user, $password, $cerrarConexiones) {
    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "INSERT INTO usuarios (nombre, constrasena) VALUES (:usuario, :contrasena)";

        $stm = $pdo->prepare($sql);

        $stm->execute($request);

        $result = "200";
    } 
    catch (PDOException $e) {
        $result = $e->getMessage();
    }
    finally {
        $cerrarConexiones($pdo, $stm);
    }

    return $result;
};