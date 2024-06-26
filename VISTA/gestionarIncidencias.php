<?php
include_once "../MODELO/Funciones.php";

session_start();
require_once("../VISTA/FuncionesVista.php");
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="icon" href="https://www.adsierra.es/wp-content/uploads/2020/08/cropped-faviconADS-32x32.png" sizes="32x32">
    <title>Gestión de Incidencias</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once "header.php" ?>
    <main class="d-flex my-5">
        <?php include_once "navAdmin.php" ?>
        <div class="container p-3">
            <h1 class="text-center">Gestion de Incidencias</h1>
            <hr>
            <div id="incidencias" class="row">
                <?php 
                    include_once("buscadorIncidencias.php");
                ?>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>