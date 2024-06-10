<?php
    require_once('../MODELO/Funciones.php');
    require_once('FuncionesVista.php');

    session_start();
    $club = Funciones::obtenerClub($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.min.css" rel="stylesheet">

    <link rel="icon" href="https://www.adsierra.es/wp-content/uploads/2020/08/cropped-faviconADS-32x32.png" sizes="32x32">
    <title>Perfil Club</title>
    
</head>
<body class="bg-light d-flex flex-column h-100">
    <?php include("header.php"); ?>

    <main class="d-flex">
        <?php include("navAdmin.php") ?>

        <div class="container-fluid">
            <div class="row my-5">   
                <div class="col-6">
                    <?php echo FuncionesVista::imprimirDatosClub($club); ?>
                </div>
            </div>
        </div>
    </main>

    <?php include("footer.php"); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
