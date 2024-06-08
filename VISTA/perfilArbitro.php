<?php
    require_once('../MODELO/Funciones.php');
    require_once('FuncionesVista.php');

    session_start();

    if(isset($_GET["id"])){
        $idArbitro = $_GET["id"];
        $arbitro = Funciones::obtenerArbitro($idArbitro);
    }
    
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.min.css" rel="stylesheet">

    <link rel="icon" href="../imagenes/Logos/logo1.png" type="image/x-icon">
    <title>Perfil arbitro</title>
    
</head>
<body class="bg-light d-flex flex-column h-100">
    <?php include("header.php"); ?>

    <main class="d-flex">
        <?php 
        if(isset($_GET["dni"])){
            include_once "navAdmin.php";
        }else include_once "navArbitro.php"
        ?>

        <div class="container-fluid">
            <div class="row my-5">
                <div class="col-6 d-flex flex-wrap justify-content-center">
                    <div class="d-flex align-items-center mb-2" id="marcoFoto" style="width: 378px; height: 508px">
                        <?php echo FuncionesVista::mostraFotoArbitro($arbitro) ?>
                    </div>
                        
                    <form id="formImagen" name="uploadForm" class="d-flex flex-wrap" action="../CONTROLADOR/guardarImagen.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <input type="file" name="imageFile" class="form-control" id="imageFile" accept="image/*">
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
                    <?php echo FuncionesVista::imprimirDatosArbitro($arbitro) ?>
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
