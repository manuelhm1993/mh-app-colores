<?php
// ---------------- Crea un nuevo registro en la tabla usuarios - CREATE
$crearUsuario = function($request) use ($link, $user, $password, $cerrarConexiones) {
    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "INSERT INTO usuarios (nombre, contrasena) VALUES (:usuario, :contrasena)";

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

// ---------------- Comprueba si el nombre de usuario existe en la BBDD - READ
$validarNombreUsuario = function($nombre) use ($link, $user, $password, $cerrarConexiones) {
    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "SELECT * FROM usuarios WHERE nombre = ?";

        $stm = $pdo->prepare($sql);

        $stm->execute([$nombre]);

        $result = $stm->fetch(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) {
        $result = $e->getMessage();
    }
    finally {
        $cerrarConexiones($pdo, $stm);
    }

    return $result;
};
