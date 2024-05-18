<form class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearArbitro.php" enctype="multipart/form-data">
    <div class="row g-3 w-75" id="insertarArbitro">
        <h3 class="text-center">Nuevo Árbitro</h3>
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
            <p class="text-danger fs-3">La persona ya existe</p><?php
        }
        ?>
        <div class="text-end">
            <a class="btn btn-link" id="siguiente">
                Siguiente
            </a>
        </div>
    </div>

    <div class="row g-3 w-50 justify-content-center text-start" style="display:none;" id="insertarFoto">
        <h1 class="text-center">Foto de Perfil</h1>
        <div class="col-12 align-items-center rounded-circle shadow" style="width:7cm; height:7cm; background-position:center; background-size:cover; background-color:gray;" id="imagen"></div>
        <div class="col-12 text-start d-flex align-items-center">
            <input type="file" name="imageFile" id="imageFile" accept=".png, .jpg, .jpeg">
            <a class="btn btn-link" id="regresar">
                Regresar
            </a>
        </div>
        <button type="submit" class="btn btn-success">Añadir</button>
    </div>
</form>

<script>
        document.getElementById("regresar").addEventListener("click",cambiarPagina);
        document.getElementById("siguiente").addEventListener("click",cambiarPagina);

        function cambiarPagina(event){
            cajaFoto = document.getElementById("insertarFoto");
            cajaPersona = document.getElementById("insertarArbitro");

            let idTarget = event.target.id;

            if(idTarget == "siguiente"){
                cajaPersona.style.display="none";
                cajaFoto.style.display="flex";
            
            }else{
                cajaFoto.style.display="none";
                cajaPersona.style.display="flex";
            }            
        }

        document.getElementById("imageFile").addEventListener("change",subirImagen);

        function subirImagen(){
            imagenCaja = document.getElementById("imagen");
            imagen = document.getElementById("imageFile").files[0];
            urlImagen = URL.createObjectURL(imagen);
            imagenCaja.style.backgroundImage = "url("+urlImagen+")";
            console.log(imagen);
            
        }


    </script>