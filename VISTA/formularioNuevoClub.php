<form class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearClub.php" enctype="multipart/form-data">
    <div class="row g-3 w-75" id="insertarClub">
        <h3 class="text-center">Nuevo Club</h3>
        <div class="col-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del club" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label for="localizacion" class="form-label">Localizacion</label>
            <?php
                echo FuncionesVista::imprimirSelectLocalizaciones("localizacion","localizacion");
            ?>
        </div>
        <div class="col-6 mb-3">
            <label for="localizacion" class="form-label">Sede</label>
            <?php
                echo FuncionesVista::imprimirSelectPolideportivos("polideportivo","polideportivo");
            ?>
        </div>
        <div class="col-6 mb-3">
            <label for="deporte" class="form-label">Deporte</label>
            <?php
                echo FuncionesVista::imprimirSelectDeportes("deporte","deporte");
            ?>    
        </div>
        <div class="col-6 mb-3">
            <label for="personaContacto" class="form-label">Persona de Contacto</label>
            <input type="text" class="form-control" id="personaContacto" name="personaContacto" placeholder="Ingrese el nombre del contacto" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label for="telefono" class="form-label">Teléfono de Contacto</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono del contacto" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label for="correo" class="form-label">Correo de Contacto</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo del contacto" autocomplete="off" required>
        </div>
        <?php
        if(isset($_GET["insert"]) && ($_GET["insert"] == "error")){?>
            <p class="text-danger fs-3">El Club ya existe</p><?php
        }
        ?>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Añadir</button>
        </div>
    </div>
        
        
    
</form>
