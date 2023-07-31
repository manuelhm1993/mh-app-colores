<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - colores</title>

    <link rel="stylesheet" href="assets/vendor/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/sweetalert2-11.7.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome-free-6.4.0-web/css/fontawesome-free-6.4.0-web.all.min.css">

    <?php 
    include_once "database/colores_crud.php";

    $colores = $selectColores();
    ?>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <!-- CREATE -->
                <?php if(http_response_code() === 200) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>¡Éxito!</strong> Acción completada satisfactoriamente
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>

                <?php if(http_response_code() === 404) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Ha ocurrido un error!</strong> No se pudo completar la acción
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>

                <!-- READ -->
                <?php if(!is_array($colores)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Error!</strong> <?php echo $colores ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <!-- READ -->
            <div class="col-md-6">
                <?php
                if(is_array($colores)) {
                    // ---------------- Manipular el resulset
                    foreach ($colores as $color) {
                ?>
                
                <!-- La clase de bootstrap se sustituye por el titulo del color -->
                <div class="alert alert-<?php echo $color["titulo"]  ?> text-capitalize" role="alert">
                    <?php echo "{$color["titulo"]} - {$color["descripcion"]}"  ?>
                </div>
                <?php 
                    } // ---------------- Cierre foreach
                } // ---------------- Cierre if
                ?>
            </div>

            <!-- CREATE -->
            <div class="col-md-6">
                <h2>Agregar elementos</h2>

                <form action="database/colores_crud.php" method="post" id="form-colores">
                    <input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
                    <input type="text" class="form-control mt-3" name="descripcion" placeholder="Descripción" required>
                    <input type="hidden" name="accion">
                    
                    <button class="btn btn-primary mt-3" type="submit">Agregar</button>
                    <?php if(count($colores) > 0) { ?>
                    <button class="btn btn-danger mt-3" type="submit">Vaciar listado</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/vendor/bootstrap-5.3.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/sweetalert2-11.7.20/dist/sweetalert2.all.min.js"></script>
    <script src="assets/vendor/fontawesome-free-6.4.0-web/js/fontawesome-free-6.4.0-web.all.min.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>