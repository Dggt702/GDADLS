    <form id="formularioArbitro" class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearArbitro.php" enctype="multipart/form-data">
        <div class="row g-3 w-75" id="insertarArbitro">
            <h3 class="text-center">Nuevo Árbitro</h3>
            <div class="col-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la persona" autocomplete="off" required>
                <span class="text-danger fw-bold" id="errorNombre"></span>
            </div>
            <div class="col-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos de la persona" autocomplete="off" required>
                <span class="text-danger fw-bold" id="errorApellidos"></span>
            </div>
            <div class="col-6 mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI de la persona" autocomplete="off" required>
                <span class="text-danger fw-bold" id="errorDNI"></span>
            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono de contacto la persona" autocomplete="off" required>
                <span class="text-danger fw-bold" id="errorTelefono"></span>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo de contacto de la persona" autocomplete="off" required>
                <span class="text-danger fw-bold" id="errorEmail"></span>
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
            
                <input type="file" name="imageFile" id="imageFile" accept=".png, .jpg, .jpeg" required>
                <a class="btn btn-link" id="regresar">
                    Regresar
                </a>
            </div>
            <span class="text-center text-danger fw-bold" id="errorImageFile"></span>
            <button id="agregarArbitro" type="submit" class="btn btn-success" disabled>Añadir</button>
        </div>
    </form>


<script>

    function validarFormulario() {
        // Obtener los valores de los campos del formulario
        let nombre = document.getElementById('nombre').value.trim();
        let apellidos = document.getElementById('apellidos').value.trim();
        let dni = document.getElementById('dni').value.trim();
        let telefono = document.getElementById('telefono').value.trim();
        let email = document.getElementById('email').value.trim();
        let imageFile = document.getElementById('imageFile').value.trim();

        // Variables para controlar los errores
        let hayError = false;

        // Limpiar mensajes de error previos
        document.getElementById('errorNombre').textContent = '';
        document.getElementById('errorApellidos').textContent = '';
        document.getElementById('errorDNI').textContent = '';
        document.getElementById('errorTelefono').textContent = '';
        document.getElementById('errorEmail').textContent = '';
        document.getElementById('errorImageFile').textContent = '';

        // Validar campo nombre
        if (nombre === '') {
            document.getElementById('errorNombre').textContent = 'El nombre es obligatorio';
            hayError = true;
        } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre)) {
            document.getElementById('errorNombre').textContent = 'El nombre solo debe contener letras';
            hayError = true;
        }

        // Validar campo apellidos
        if (apellidos === '') {
            document.getElementById('errorApellidos').textContent = 'Los apellidos son obligatorios';
            hayError = true;
        }

        // Validar campo DNI
        if (dni === '') {
            document.getElementById('errorDNI').textContent = 'El DNI es obligatorio';
            hayError = true;
        } else if (!/^\d{8}[a-z A-Z]/.test(dni)) { // Asumiendo que el DNI debe tener exactamente 8 dígitos
            document.getElementById('errorDNI').textContent = 'El DNI es inválido';
            hayError = true;
        }

        // Validar campo teléfono
        if (telefono === '') {
            document.getElementById('errorTelefono').textContent = 'El teléfono es obligatorio';
            hayError = true;
        } else if (!validarTelefono(telefono)) {
            document.getElementById('errorTelefono').textContent = 'El teléfono no es válido';
            hayError = true;
        }

        // Validar campo email
        if (email === '') {
            document.getElementById('errorEmail').textContent = 'El correo electrónico es obligatorio';
            hayError = true;
        } else if (!validarEmail(email)) {
            document.getElementById('errorEmail').textContent = 'El correo electrónico no es válido';
            hayError = true;
        }

        // Validar campo imagen
        if (imageFile === '') {
            document.getElementById('errorImageFile').textContent = 'Debe seleccionar una imagen';
            hayError = true;
        }

        if(hayError==true){
            document.getElementById("agregarArbitro").setAttribute("disabled","true");
        }else{
            document.getElementById("agregarArbitro").removeAttribute("disabled");
        }
        // Si hay algún error, prevenir el envío del formulario
        return !hayError;
    }

    function validarEmail(email) {
        // Expresión regular para validar el formato del correo electrónico
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validarTelefono(telefono) {
        // Expresión regular para validar el formato del teléfono
        let re = /^[0-9]{9,15}$/; // Ajustar según el formato de teléfono deseado
        return re.test(telefono);
    }
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
        
        document.getElementById("formularioArbitro").addEventListener("change",validarFormulario);

        document.getElementById("imageFile").addEventListener("change",subirImagen);

        function subirImagen(){
            imagenCaja = document.getElementById("imagen");
            imagen = document.getElementById("imageFile").files[0];
            urlImagen = URL.createObjectURL(imagen);
            imagenCaja.style.backgroundImage = "url("+urlImagen+")";
            console.log(imagen);
            
        }


    </script>