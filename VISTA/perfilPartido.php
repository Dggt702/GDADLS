<?php
    require_once('../MODELO/Funciones.php');
    require_once('FuncionesVista.php');

    session_start();
    $partido = Funciones::obtenerPartido($_GET["id"]);

    $deporte = Funciones::obtenerDeporte($partido->getDeporte());
    $local = Funciones::obtenerClub($partido->getLocal());
    $visitante = Funciones::obtenerClub($partido->getVisitante());
    $polideportivo = Funciones::obtenerPolideportivo($local->getPolideportivo());
    $pueblo = Funciones::obtenerPueblo($local->getLocalizacion());
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.min.css" rel="stylesheet">

    <link rel="icon" href="https://www.adsierra.es/wp-content/uploads/2020/08/cropped-faviconADS-32x32.png" sizes="32x32">
    <title>Perfil Partido</title>
    
</head>
<body class="bg-light d-flex flex-column h-100">
    <?php include("header.php"); ?>

    <main class="d-flex">
        <?php include("navAdmin.php") ?>

        <div class="container-fluid">
            <form action="../CONTROLADOR/actualizarPartido.php" method="GET" class="row justify-content-center my-5">
                <div class="row w-75">
                    <h1 class="text-center"><?php echo $local->getNombre() .' vs '. $visitante->getNombre() ?></h1>
                    <input type="text" name="id" value="<?php echo $partido->getId() ?>" hidden>
                    <input type="text" name="local" value="<?php echo $partido->getLocal() ?>" hidden>
                    <input type="text" name="visitante" value="<?php echo $partido->getVisitante() ?>" hidden>
                    <div class="col-6 mb-3">
                        <label class="form-label">Jornada</label>
                        <input type="text" name="jornada" class="form-control" value="<?php echo $partido->getJornada() ?>" placeholder="<?php echo $partido->getJornada() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Temporada</label>
                        <input type="text" name="Temporada" class="form-control" value="<?php echo $partido->getTemporada() ?>" placeholder="<?php echo $partido->getTemporada() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="text" name="date" class="form-control" value="<?php echo $partido->getFecha() ?>" placeholder="<?php echo $partido->getFecha() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Localización</label>
                        <input type="text" name="localizacion" class="form-control" value="<?php echo $pueblo->getNombre() ?>" placeholder="<?php echo $pueblo->getNombre() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Sede</label>
                        <input type="text" name="sede" class="form-control" value="<?php echo $polideportivo->getUbicacion() ?>" placeholder="<?php echo $polideportivo->getUbicacion() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Deporte</label>
                        <input type="text" name="deporte" class="form-control" value="<?php echo $deporte->getNombre() ?>" placeholder="<?php echo $deporte->getNombre() ?>">
                    </div>                    
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </main>

    <?php include("footer.php"); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
