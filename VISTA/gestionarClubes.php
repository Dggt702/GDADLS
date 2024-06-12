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
    <title>Acceso | Gestión de Clubes</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once "header.php" ?>
    <main class="d-flex my-5">
        <?php include_once "navAdmin.php" ?>
        <div class="container p-3">
            <h1 class="text-center">Gestión de Clubes</h1>
            <hr>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-4 d-flex justify-content-evenly">
                    <input type="radio" class="btn-check" onclick="toggleBox(event)" name="btnradio" id="btn_nuevoClub" autocomplete="off">
                    <label class="d-flex align-items-center btn btn-success fw-bold fs-3 p-5" for="btn_nuevoClub">Añadir Club</label>
                </div>
                <div class="col-4 d-flex justify-content-evenly">
                    <input type="radio" class="btn-check" onclick="toggleBox(event)" name="btnradio" id="btn_verClubes" autocomplete="off">
                    <label class="d-flex align-items-center btn btn-success fw-bold fs-3 p-5" for="btn_verClubes">Ver Clubes</label>
                </div>
            </div>
            <div id="form_nuevoClub" class="row" style="display: none">
                <?php 
                    include_once "formularioNuevoClub.php";
                ?>
            </div>
            <div id="tabla_clubes" class="row" style="display: none">
                <?php 
                    include ("buscadorClub.php");
                ?>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>

    <script>
        function toggleBox(event){
            form_nuevoClub = document.getElementById("form_nuevoClub");
            tabla_clubes = document.getElementById("tabla_clubes");

            btn_nuevoClub = document.getElementById("btn_nuevoClub");
            btn_verClubes = document.getElementById("btn_verClubes");

            var idElemento = event.target.id;

            if (idElemento == btn_nuevoClub.getAttribute("id")) {
                form_nuevoClub.style.display = "block";
                tabla_clubes.style.display = "none";
                btn_nuevoClub.style.display = "none";
            }
            if (idElemento == btn_verClubes.getAttribute("id")) {
                tabla_clubes.style.display = "block";
                form_nuevoClub.style.display = "none";
            }
        }
    </script>
</body>
</html>