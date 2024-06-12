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

    <main class="d-flex mt-3 mb-5">
        <?php include("navAdmin.php") ?>

        <div class="container-fluid">
            <div class="row">
                <h1 class="text-center"><?php echo $local->getNombre() .' vs '. $visitante->getNombre() ?></h1>
                <div class="col-6 d-flex flex-wrap justify-content-center">
                    <div class="d-flex align-items-center mb-2" id="marcoFoto">
                        <?php echo FuncionesVista::mostraFotoActa($partido->getId()) ?>
                    </div>
                        
                    <form id="formImagen" name="uploadForm" class="d-flex flex-wrap" action="../CONTROLADOR/guardarImagenActa.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <input type="file" name="imageFile" class="form-control" id="imageFile" accept="image/*">
                            <input type="image" name="imageCropped" class="form-control" id="imageForm" hidden>
                            <input type="text" name="idPartido" class="form-control" value="<?php echo $partido->getId() ?>" hidden>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-success" type="submit" class="mt-3">Guardar</button>
                            <?php
                                include_once("fotoActa.php");
                            ?>   
                            <button id="openCropModal" class="btn btn-secondary">Recortar Foto</button>
                        </div> 
                        
                    </form>
                    
                    <div id="confirmationModal" style="display: none;">
                        <div>
                            <h3>¿Deseas recortar la imagen?</h3>
                            <button class="btn btn-success" id="confirmCrop">Confirmar</button>
                            <button class="btn btn-danger" id="cancelCrop">Cancelar</button>
                        </div>
                    </div>

                    <img id="previewImage" src="" class="img-fluid" alt="Vista previa" style="display: none;">
                    <canvas id="cropperContainer" style="display: none;"></canvas>
                    

                    
                </div>
                <div class="col-6">
                    <form action="../CONTROLADOR/actualizarPartido.php" method="GET">
                        <div class="row my-5">
                            <input type="text" name="id" value="<?php echo $partido->getId() ?>" hidden>
                            <input type="text" name="local" value="<?php echo $partido->getLocal() ?>" hidden>
                            <input type="text" name="visitante" value="<?php echo $partido->getVisitante() ?>" hidden>
                            <div class="col-6 mb-3">
                                <label class="form-label">Jornada</label>
                                <input type="text" name="jornada" class="form-control" value="<?php echo $partido->getJornada() ?>" placeholder="<?php echo $partido->getJornada() ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Temporada</label>
                                <input type="text" name="temporada" class="form-control" value="<?php echo $partido->getTemporada() ?>" placeholder="<?php echo $partido->getTemporada() ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="text" class="form-control" value="<?php echo $partido->getFecha() ?>" placeholder="<?php echo $partido->getFecha() ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Localización</label>
                                <input type="text" name="localizacion" class="form-control" value="<?php echo $pueblo->getNombre() ?>" placeholder="<?php echo $pueblo->getNombre() ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Sede</label>
                                <input type="text" name="sede" class="form-control" value="<?php echo $polideportivo->getUbicacion() ?>" placeholder="<?php echo $polideportivo->getUbicacion() ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Deporte</label>
                                <input type="text" name="deporte" class="form-control" value="<?php echo $deporte->getNombre() ?>" placeholder="<?php echo $deporte->getNombre() ?>" readonly>
                            </div>                    
                            <button type="submit" class="btn btn-success w-100 d-none">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("footer.php"); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/recortar.js"></script>
</body>
</html>
