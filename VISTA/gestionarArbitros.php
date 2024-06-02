<?php
include_once "../MODELO/Funciones.php";
include_once "FuncionesVista.php";

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
            <h1 class="text-center">Gestión de Árbitros</h1>
            <hr>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-4 d-flex justify-content-evenly">
                    <input type="radio" class="btn-check" onclick="toggleBox(event)" name="btnradio" id="btn_nuevoArbitro" autocomplete="off">
                    <label class="d-flex align-items-center btn btn-success fw-bold fs-3 p-5" for="btn_nuevoArbitro">Añadir Árbitro</label>
                </div>
                <div class="col-4 d-flex justify-content-evenly">
                    <input type="radio" class="btn-check" onclick="toggleBox(event)" name="btnradio" id="btn_verArbitros" autocomplete="off">
                    <label class="d-flex align-items-center btn btn-success fw-bold fs-3 p-5" for="btn_verArbitros">Ver Árbitros</label>
                </div>
            </div>
            <div id="form_nuevoArbitro" class="row" style="display: none">
                <?php 
                    include_once "formularioNuevoArbitro.php";
                ?>
            </div>
            <div id="tabla_arbitros" class="row" style="display: none">
                <?php 
                    echo FuncionesVista::imprimirTablaArbitros();
                ?>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>

    <script>
        function toggleBox(event){
            form_nuevoArbitro = document.getElementById("form_nuevoArbitro");
            tabla_arbitros = document.getElementById("tabla_arbitros");

            btn_nuevoArbitro = document.getElementById("btn_nuevoArbitro");
            btn_verArbitros = document.getElementById("btn_verArbitros");

            var idElemento = event.target.id;

            if (idElemento == btn_nuevoArbitro.getAttribute("id")) {
                form_nuevoArbitro.style.display = "block";
                tabla_arbitros.style.display = "none";
                btn_nuevoArbitro.style.display = "none";
            }
            if (idElemento == btn_verArbitros.getAttribute("id")) {
                tabla_arbitros.style.display = "block";
                form_nuevoArbitro.style.display = "none";
            }
        }

        function cambiarColor(id){
            if(document.getElementById(id).classList.contains("table-danger")){
                document.getElementById(id).classList.remove("table-danger");
            }else{
                document.getElementById(id).classList.add("table-danger");
            }
        }
    </script>
</body>
</html>