<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - colores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <?php include_once "database/colores_crud.php" ?>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <!-- READ -->
            <div class="col-md-6">
                <?php

                $colores = $selectColores();

                if(is_array($colores)) {
                    // ---------------- Manipular el resulset
                    foreach ($colores as $color) {
                ?>
                
                <!-- La clase de bootstrap se sustituye por el titulo del color -->
                <div class="alert alert-<?php echo $color["titulo"]  ?> text-capitalize" role="alert">
                    <ul>
                        <li><?php echo "ID: {$color["id"]}"  ?></li>
                        <li><?php echo "Nombre: {$color["titulo"]}"  ?></li>
                        <li><?php echo "Descripción: {$color["descripcion"]}"  ?></li>
                    </ul>
                </div>
                <?php 
                    } // ---------------- Cierre foreach
                } // ---------------- Cierre if
                ?>
            </div>

            <!-- CREATE -->
            <div class="col-md-6">
                <h2>Agregar elementos</h2>

                <form action="database/colores_crud.php" method="post">
                    <input type="text" class="form-control" name="titulo" placeholder="Titulo">
                    <input type="text" class="form-control mt-3" name="descripcion" placeholder="Descripción">
                    
                    <button class="btn btn-primary mt-3">Agregar</button>
                </form>
            </div>

            <?php if(!is_array($colores)) { ?>
            <!-- La clase de bootstrap se sustituye por el titulo del color -->
            <div class="alert alert-danger text-capitalize" role="alert">
                <?php echo $colores ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>