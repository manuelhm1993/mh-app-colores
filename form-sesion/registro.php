<?php
    require_once "vista_registro.php";
    require_once "vista_login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "{$vista_registro["titulo"]} - {$vista_login["titulo"]} de usuario" ?></title>
</head>
<body>
    <?php
        echo $vista_registro["html"];
        echo $vista_login["html"];
    ?>
</body>
</html>