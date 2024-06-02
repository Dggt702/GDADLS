<?php
    session_start();

    require_once("../MODELO/Funciones.php");
    require_once("FuncionesVista.php");
  
?>

<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="icon" href="../imagenes/Logos/logo1.png" type="image/x-icon">
    <title>Eliminar Personas</title>
    
</head>
<body class="bg-light d-flex flex-column h-100">
    <?php include("header.php"); ?>

    <main class="d-flex">
        <?php include("navAdmin.php") ?>

        <div class="container-fluid my-5">
            <h1 class="text-center">Eliminar Persona</h1>
            <form action="../CONTROLADOR/eliminarArbitro.php" method="POST">
                <div class="input-group">
                    <input class="form-control" type="text" id="buscador" placeholder="Buscador">
                </div>
                <div class="mt-3" id="content">

                </div>
            </form>
        </div>
    </main>

    <?php include("footer.php"); ?>
    <script>
    
        getPersonas();
        document.getElementById("buscador").addEventListener("keyup",getPersonas);
        document.getElementById("empresa").addEventListener("change",getPersonas);

            function getPersonas(){
                let url = "../CONTROLADOR/buscadorEliminarPersona.php";
                let inputEmpresa = document.getElementById("empresa").value;
                let inputBuscador = document.getElementById("buscador").value;
                let content = document.getElementById("content");

                let formData = new FormData();
                content.innerHTML='<div class="d-flex justify-content-center"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div></div>';
            
                formData.append("empresa",inputEmpresa);
                formData.append("busqueda",inputBuscador);

                fetch(url,{
                    method:"POST",
                    body:formData
                }).then(response=>response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err=>console.log(err))
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