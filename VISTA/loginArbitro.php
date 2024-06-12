<div class="flex-column" id="formArbitro" style="display: none">
    <form action="CONTROLADOR/acceder.php" class="row g-3 justify-content-center" method="POST">
        <div class="col-12">
            <label for="identificador" class="form-label">Identificador</label>
            <input type="text" class="form-control" id="identificador" name="identificador" autocomplete="username">
        </div>
        <div class="col-12">
            <label for="contraseniaArbitro" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseniaArbitro" name="contraseniaArbitro" autocomplete="current-password">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Acceder</button>
        </div>
    </form>
    <?php
    if (isset($_GET["arbitro"]) && isset($_GET["arbitro"]) == "error") {
        echo '<div class="d-flex justify-content-between">
                <span class="fs-2 text-danger">El identificador o la contraseña no son correctos</span>
                <div class="dropdown dropstart">
                    <button class="btn btn-warning btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Recuperar contraseña
                    </button>
                    <form action="CONTROLADOR/correoRecuperarContrasenia.php" method="GET" class="dropdown-menu p-4">
                        <div class="mb-3">
                            <label class="form-label">Nombre Usuario</label>
                            <input type="text" class="form-control mb-3" name="identificador">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
            ';
    }elseif (isset($_GET["cambio"]) && isset($_GET["cambio"]) == "true"){
        echo '<span class="fs-3 text-success">La contraseña ha sido modificada con éxito, ingrese de nuevo a la página con su nueva contraseña</span>';
    }
    ?>
</div>
