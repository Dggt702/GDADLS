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
    <title>Perfil Club</title>
    
</head>
<body class="bg-light d-flex flex-column h-100">
    <?php include("header.php"); ?>

    <main class="d-flex">
        <?php include("navAdmin.php") ?>

        <div class="container-fluid">
            <form action="../CONTROLADOR/actualizarPartido.php" method="GET" class="row justify-content-center my-5">
                <div class="row w-75">
                    <h1 class="text-center">Datos del Club</h1>
                    <input type="text" name="id" class="form-control" value="<?php echo $club->getId() ?>" hidden>
                    <div class="col-12 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $club->getNombre() ?>" placeholder="<?php echo $club->getNombre() ?>">
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
                    <div class="col-6 mb-3">
                        <label class="form-label">Persona Contacto</label>
                        <input type="text" name="persona" class="form-control" value="<?php echo $club->getPersonaContacto() ?>" placeholder="<?php echo $club->getPersonaContacto() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Telefono Contacto</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $club->getTelefonoContacto() ?>" placeholder="<?php echo $club->getTelefonoContacto() ?>">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Correo Contacto</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $club->getCorreoContacto() ?>" placeholder="<?php echo $club->getCorreoContacto() ?>">
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
