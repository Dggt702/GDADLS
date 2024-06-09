<?php
include_once "../MODELO/Funciones.php";
include_once '../VISTA/FuncionesVista.php';


session_start();
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once "header.php" ?>
    <main class="d-flex my-5">
        <?php include_once "navAdmin.php" ?>
        <div class="container p-3">
            <h1 class="text-center">Gestión de Partidos</h1>
            <hr>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-4 d-flex justify-content-evenly">
                    <input type="radio" class="btn-check" onclick="toggleBox(event)" name="btnradio" id="btn_nuevoPartido" autocomplete="off">
                    <label class="d-flex align-items-center btn btn-success fw-bold fs-3 p-5" for="btn_nuevoPartido">Añadir Partido</label>
                </div>
                <div class="col-4 d-flex justify-content-evenly">
                    <input type="radio" class="btn-check" onclick="toggleBox(event)" name="btnradio" id="btn_verPartidos" autocomplete="off">
                    <label class="d-flex align-items-center btn btn-success fw-bold fs-3 p-5" for="btn_verPartidos">Ver Partidos</label>
                </div>
            </div>
            <div id="form_nuevoPartido" class="row" style="display: none">
                <?php 
                    include_once "formularioNuevoPartido.php";
                ?>
            </div>
            <div id="tabla_partidos" class="row" style="display: none">
                <?php 
                    echo FuncionesVista::imprimirTablaPartidos();
                ?>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>

    <script>
        function toggleBox(event){
            form_nuevoPartido = document.getElementById("form_nuevoPartido");
            tabla_partidos = document.getElementById("tabla_partidos");

            btn_nuevoPartido = document.getElementById("btn_nuevoPartido");
            btn_verPartidos = document.getElementById("btn_verPartidos");

            var idElemento = event.target.id;

            if (idElemento == btn_nuevoPartido.getAttribute("id")) {
                form_nuevoPartido.style.display = "block";
                tabla_partidos.style.display = "none";
                btn_nuevoPartido.style.display = "none";
            }
            if (idElemento == btn_verPartidos.getAttribute("id")) {
                tabla_partidos.style.display = "block";
                form_nuevoPartido.style.display = "none";
            }
        }
    </script>
</body>
</html>