<?php
// ---------------- Crea un nuevo registro en la tabla colores - CREATE
$createColores = function() use ($link, $user, $password, $cerrarConexiones) {
    $request = [
        ":titulo"      => $_POST["titulo"],
        ":descripcion" => $_POST["descripcion"]
    ];

    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "INSERT INTO colores (titulo, descripcion) VALUES (:titulo, :descripcion)";

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

// ---------------- Devuelve un array asociativo con todos los registros de la tabla colores - READ
$selectColores = function() use ($link, $user, $password, $cerrarConexiones) {
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
        $result = $e->getMessage();

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

// ---------------- Devuelve un array asociativo con los valores correspondientes al registro a editar - UPDATE
$editarColor = function() use ($link, $user, $password, $cerrarConexiones) {
    $request = [$_POST["id"]];

    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "SELECT * FROM colores WHERE id = ?";

        $stm = $pdo->prepare($sql);

        $stm->execute($request);

        // ---------------- Si se va a utilizar un único registro se usa fetch
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

// ---------------- Actualiza el item selecconado - UPDATE
$actualizarColor = function() use ($link, $user, $password, $cerrarConexiones) {
    $request = [$_POST["titulo"], $_POST["descripcion"], $_POST["id"]];

    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "UPDATE colores SET titulo = ?, descripcion = ? WHERE id = ?";

        $stm = $pdo->prepare($sql);

        $stm->execute($request);

        $result = $stm->rowCount();
    } 
    catch (PDOException $e) {
        $result = $e->getMessage();
    }
    finally {
        $cerrarConexiones($pdo, $stm);
    }

    return $result;
};

// ---------------- Recibe el id del registro a eliminar - DELETE
$eliminarColor = function() use ($link, $user, $password, $cerrarConexiones) {
    $request = [$_POST["id"]];

    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "DELETE FROM colores WHERE id = ?";

        $stm = $pdo->prepare($sql);

        $stm->execute($request);

        $result = $stm->rowCount();
    } 
    catch (PDOException $e) {
        $result = $e->getMessage();
    }
    finally {
        $cerrarConexiones($pdo, $stm);
    }

    return $result;
};

// ---------------- Elimina todo los registros de la tabla colores - DELETE
$eliminarColores = function() use ($link, $user, $password, $cerrarConexiones) {
    try {
        $pdo = new PDO($link, $user, $password);

        $sql = "DELETE FROM colores";

        $stm = $pdo->prepare($sql);

        $stm->execute();

        $result = $stm->rowCount();
    } 
    catch (PDOException $e) {
        $result = $e->getMessage();
    }
    finally {
        $cerrarConexiones($pdo, $stm);
    }

    return $result;
};