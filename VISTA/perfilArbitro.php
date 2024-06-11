<?php
require_once('../MODELO/Funciones.php');
require_once('FuncionesVista.php');

session_start();

if(isset($_SESSION['idArbitro'])){
    $idArbitro = $_GET["id"];
    $arbitro = Funciones::obtenerArbitro($idArbitro);
    $modificar = '';
}elseif(isset($_SESSION['idAdmin'])){
    $dniArbitro = $_GET["dni"];
    $arbitro = Funciones::obtenerArbitroPorDni($dniArbitro);
    $modificar = 'readonly';
}else header('Location: ../index.php');

    
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.min.css" rel="stylesheet">

    <link rel="icon" href="https://www.adsierra.es/wp-content/uploads/2020/08/cropped-faviconADS-32x32.png" sizes="32x32">
    <title>Perfil arbitro</title>
    
</head>
<body class="bg-light d-flex flex-column h-100">
    <?php include("header.php"); 
        if(isset($_SESSION['idArbitro'])) include_once "navArbitro.php"; ?>
    

    <main class="d-flex">
        <?php if(isset($_GET["dni"])) include_once "navAdmin.php"; ?>

        <div class="container">
            <div class="row my-5">
                <div class="col-6 d-flex flex-wrap justify-content-center">
                    <div class="d-flex align-items-center mb-2" id="marcoFoto" style="width: 378px; height: 508px">
                        <?php echo FuncionesVista::mostraFotoArbitro($arbitro) ?>
                    </div>
                        
                    <form id="formImagen" name="uploadForm" class="d-flex flex-wrap" action="../CONTROLADOR/guardarImagen.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <input type="file" name="imageFile" class="form-control" id="imageFile" accept=".png, .jpg, .jpeg">
                            <input type="image" name="imageCropped" class="form-control" id="imageForm" hidden>
                            <input type="text" name="dni" class="form-control" value="<?php echo $arbitro->getDni() ?>" hidden>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-success" type="submit" class="mt-3">Guardar</button>
                            <?php
                                include_once("foto.php");
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
                <form action="../CONTROLADOR/actualizarArbitro.php" method="GET">
                    <div class="row">
                        <h1 class="text-center">Datos del Árbitro</h1>
                        <input type="text" name="id" value="<?php echo $arbitro->getId() ?>" hidden>
                        <div class="col-6 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $arbitro->getNombre() ?>" placeholder="<?php echo $arbitro->getNombre() ?>" <?php echo $modificar ?>>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="<?php echo $arbitro->getApellidos() ?>" placeholder="<?php echo $arbitro->getApellidos() ?>" <?php echo $modificar ?>>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text" name="dni" class="form-control" value="<?php echo $arbitro->getDni() ?>" placeholder="<?php echo $arbitro->getDni() ?>" <?php echo $modificar ?>>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="dni" class="form-control" value="<?php echo $arbitro->getContrasenia() ?>" placeholder="<?php echo $arbitro->getContrasenia() ?>" readonly>
                        <?php
                        if(isset($_SESSION['idArbitro'])){ ?>
                            <form class="dropdown-menu d-none"></form>
                            <div class="dropdown mt-3">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    Cambiar Contraseña
                                </button>
                                <form action="../CONTROLADOR/cambiarContrasenia.php" method="POST" class="dropdown-menu p-4">
                                    <input type="text" name="idArbitro" value="<?php echo $arbitro->getId() ?>" hidden>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña antigua</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nueva contraseña</label>
                                        <input type="password" name="newPassword" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Número de teléfono</label>
                            <input type="text" name="tel" class="form-control" value="<?php echo $arbitro->getTelefono() ?>" placeholder="<?php echo $arbitro->getTelefono() ?>" <?php echo $modificar ?>>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="text" name="correo" class="form-control" value="<?php echo $arbitro->getEmail() ?>" placeholder="<?php echo $arbitro->getEmail() ?>" <?php echo $modificar ?>>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Disponibilidad</label>
                            <br>
                        <?php
                        if($arbitro->getDisponibilidad()=="DISPONIBLE"){ ?>
                            <div class="btn-group col-12" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="disponibilidad" id="btnradio1" value="DISPONIBLE" autocomplete="off" checked>
                                <label class="btn btn-outline-warning" for="btnradio1">Disponible</label>

                                <input type="radio" class="btn-check" name="disponibilidad" id="btnradio2" value="DE BAJA" autocomplete="off">
                                <label class="btn btn-outline-danger" for="btnradio2">De Baja</label>
                            </div>
                        <?php }else{ ?>
                            <div class="btn-group col-12" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="disponibilidad" id="btnradio1" value="DISPONIBLE" autocomplete="off">
                                <label class="btn btn-outline-warning" for="btnradio1">Disponible</label>

                                <input type="radio" class="btn-check" name="disponibilidad" id="btnradio2" value="DE BAJA" autocomplete="off" checked> 
                                <label class="btn btn-outline-danger" for="btnradio2">De Baja</label>
                            </div>
                        <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
                </div>
                <?php
                if(isset($_GET["contrasenia"])){
                    if($_GET["contrasenia"] == "false"){ ?>
                        <p class="text-danger fs-3">La contraseña es incorrecta</p>
                <?php }elseif($_GET["contrasenia"] == "true"){ ?>
                        <p class="text-success fs-3">La contraseña ha sido modificada con éxito</p>
                <?php }
                } ?>
            </div>
        </div>
    </main>

    <?php include("footer.php"); ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/cropperjs@1.5.12/dist/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/recortar.js"></script>
    <script>

        document.getElementById("imageFile").addEventListener("change",subirImagen);

        function subirImagen(){
            imagen = document.getElementById("imageFile").files[0];
            urlImagen = URL.createObjectURL(imagen);
            imagenCaja.src=urlImagen;
        }

    </script>
</body>
</html>
