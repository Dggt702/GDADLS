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
                <div class="">
                    <h1 class="text-center">Partidos Próximos</h1>
                    <hr>
                </div>
                <div class="d-flex justify-content-center" id="radioDeporte">
                    <?php
                        echo FuncionesVista::imprimirRadioDeDeportes();
                    ?>
                </div>
            <div class="mt-5 row" id="content">
                
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    
    const deportes = document.getElementsByName("deporte");
        for (let i = 0; i < deportes.length; i++) {
            deportes[i].addEventListener("change",getData);    
        }

    getData();
    function getData(){
        var inputDeporte;
        for (let i = 0; i < deportes.length; i++) {
            if(deportes[i].checked==true){
                inputDeporte = deportes[i].value;
                break;
            }
        }

        let url = "../CONTROLADOR/partidosProximos.php";
        let content = document.getElementById("content");
        let formData = new FormData();
        formData.append('filtradoDeporte',inputDeporte);
        fetch(url,{
            method:"POST",
            body:formData
        }).then(response=>response.json())
        .then(data => {
            content.innerHTML = data
        }).catch(err=>console.log(err))
    }

</script>
</body>

</html>