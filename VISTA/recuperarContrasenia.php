<?php
require_once '../MODELO/Funciones.php';

isset($_GET["token"]) ? $token = $_GET["token"] : header('Location: ../index.php');

$result = Funciones::buscarToken($token);

if ($result && strtotime($result['fecha_exp']) > time()) {
    // El token es válido y no ha expirado
} else
    exit('El enlace de restablecimiento ha expirado o es inválido.');
?>

<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Inicio</title>
</head>
<body class="bg-light d-flex flex-column h-100">

    <?php include("header.php"); ?>    

    <main class="d-flex">
        <div class="container">
            <form action="../CONTROLADOR/cambiarContrasenia.php" method="POST" class="d-flex justify-content-center mt-5">
                <div class="row w-75">
                    <h1 class="text-center">Cambiar Contraseña</h1>
                    <div class="col-12 mb-3">
                        <input type="text" name="token" value="<?php $token ?>" hidden>
                        <label class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control mb-3" name="identificador" placeholder="Ingrese un nombre de usuario" autocomplete="off" required>
                        <label class="form-label">Nueva Contraseña</label>
                        <input type="text" class="form-control mb-3" name="contrasenia" placeholder="Ingrese una contraseña segura" autocomplete="off" required>
                        <?php
                        if(isset($_GET["error"]) == "true"){?>
                            <span class="fs-2 text-danger mb-3">El ususario no es correcto</span>
                        <?php }
                        ?>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php include("footer.php"); ?>
</body>
</html>