<form class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearArbitro.php" enctype="multipart/form-data">
    <div class="row g-3 w-75" id="insertarPartido">
        <h3 class="text-center">Nuevo Partido</h3>
        <div class="col-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la persona" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos de la persona" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" placeholder="Ingrese el DNI de la persona" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Teléfono</label>
            <input type="tel" class="form-control" name="telefono" placeholder="Ingrese el teléfono de contacto la persona" autocomplete="off" required>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Correo</label>
            <input type="email" class="form-control" name="mail" placeholder="Ingrese el correo de contacto de la persona" autocomplete="off" required>
        </div>
        <?php
        if(isset($_GET["insert"]) && ($_GET["insert"] == "error")){?>
            <p class="text-danger fs-3">El partido ya existe</p><?php
        }
        ?>
        <button type="submit" class="btn btn-success">Añadir</button>
    </div>
</form>