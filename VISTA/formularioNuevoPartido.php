<form id="formularioPartido" class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearPartido.php" enctype="multipart/form-data">
        <div class="row g-3 w-75" id="insertarPartido">
            <h3 class="text-center">Nuevo Partido</h3>
            <div class="col-6 mb-3">
                <label for="temporada" class="form-label">Temporada</label>
                <select name="temporada" id="temporada" class="form-select" required>
                    <option value="" selected hidden disabled>Elige Temporada</option>
                    <option value="2020/21">2020/21</option>
                    <option value="2021/22">2021/22</option>
                    <option value="2022/23">2022/23</option>
                    <option value="2023/24">2023/24</option>
                    <option value="2024/25">2024/25</option>
                </select>
                <span class="text-danger fw-bold" id="errorTemporada"></span>
            </div>
            <div class="col-6 mb-3">
                <label for="jornada" class="form-label">Jornada</label>
                <select name="jornada" id="jornada" class="form-select" required>
                    <option value="" selected hidden disabled>Elige Jornada</option>
                    <option value="1">Jornada 1</option>
                    <option value="2">Jornada 2</option>
                    <option value="3">Jornada 3</option>
                    <option value="4">Jornada 4</option>
                    <option value="5">Jornada 5</option>
                </select>
                <span class="text-danger fw-bold" id="errorJornada"></span>
            </div>
            <div class="col-6 mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" autocomplete="off" required>
                <span class="text-danger fw-bold" id="errorFecha"></span>
            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Deporte</label>
                <?php echo FuncionesVista::imprimirSelectDeportes("deporte","deporte") ?>
                <span class="text-danger fw-bold" id="errorDeporte"></span>
            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Categoría</label>
                <?php echo FuncionesVista::imprimirSelectCategorias("categoria","categoria") ?>
                <span class="text-danger fw-bold" id="errorCategoria"></span>
            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Árbitro</label>
                <?php echo FuncionesVista::imprimirSelectArbitrosDisponibles("arbitro","arbitro") ?>
                <span class="text-danger fw-bold" id="errorArbitro"></span>
            </div>
            <div class="col-6 mb-3" id="selectClubLocal">
              
            </div>
            <div class="col-6 mb-3" id="selectClubVisitante">
               
            </div>
            <?php
            if(isset($_GET["insert"]) && ($_GET["insert"] == "error")){?>
                <p class="text-danger fs-3">El partido ya existe</p><?php
            }
            ?>
            <button id="agregarPartido" type="submit" class="btn btn-success">Añadir</button>
        </div>
    </form>

<script>


    function validarFormulario() {
        // Obtener los valores de los campos del formulario
        let temporada = document.getElementById('temporada').value;
        let jornada = document.getElementById('jornada').value;
        let fecha = document.getElementById('fecha').value;
        let deporte = document.getElementsByName('deporte')[0].value; // Ajuste según el id del select de deporte
        let categoria = document.getElementsByName('categoria')[0].value; // Ajuste según el id del select de categoría
        let arbitro = document.getElementsByName('arbitro')[0].value; // Ajuste según el id del select de árbitro

        // Variables para controlar los errores
        let hayError = false;

        // Limpiar mensajes de error previos
        document.getElementById('errorTemporada').textContent = '';
        document.getElementById('errorJornada').textContent = '';
        document.getElementById('errorFecha').textContent = '';
        document.getElementById('errorDeporte').textContent = '';
        document.getElementById('errorCategoria').textContent = '';
        document.getElementById('errorArbitro').textContent = '';

        // Validar campo temporada
        if (temporada === '') {
            document.getElementById('errorTemporada').textContent = 'La temporada es obligatoria';
            hayError = true;
        }

        // Validar campo jornada
        if (jornada === '') {
            document.getElementById('errorJornada').textContent = 'La jornada es obligatoria';
            hayError = true;
        }

        // Validar campo fecha
        if (fecha === '') {
            document.getElementById('errorFecha').textContent = 'La fecha es obligatoria';
            hayError = true;
        } else if (new Date(fecha) < new Date()) {
            document.getElementById('errorFecha').textContent = 'La fecha no puede ser anterior a la fecha actual';
            hayError = true;
        }

        // Validar campo deporte
        if (deporte === '') {
            document.getElementById('errorDeporte').textContent = 'El deporte es obligatorio';
            hayError = true;
        }

        // Validar campo categoría
        if (categoria === '') {
            document.getElementById('errorCategoria').textContent = 'La categoría es obligatoria';
            hayError = true;
        }

        // Validar campo árbitro
        if (arbitro === '') {
            document.getElementById('errorArbitro').textContent = 'El árbitro es obligatorio';
            hayError = true;
        }

        if(hayError==true){
            document.getElementById("agregarPartido").setAttribute("disabled","true");
        }else{
            document.getElementById("agregarPartido").removeAttribute("disabled");
        }
    }

    document.getElementById("formularioPartido").addEventListener("change",validarFormulario);

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("deporte").addEventListener("change", function() {
            getClubesLocal();
            getClubesVisitante();
        });
        
        function getClubesLocal(){
            let inputDeporte = document.getElementById("deporte").value;

            let divLocal = document.getElementById("selectClubLocal");
            let url = "../CONTROLADOR/clubesDeporte.php";
            let formData = new FormData();
            
            formData.append('deporte',inputDeporte);
            formData.append('local',1);

            fetch(url,{
                method:"POST",
                body:formData
            }).then(response=>response.json())
            .then(data => {
                divLocal.innerHTML = data;
            }).catch(err=>console.log(err))
        }

        function getClubesVisitante(){
            let inputDeporte = document.getElementById("deporte").value;

            let divVisitante = document.getElementById("selectClubVisitante");
            let url = "../CONTROLADOR/clubesDeporte.php";
            let formData = new FormData();
            
            formData.append('deporte',inputDeporte);
            formData.append('visitante',2);

            fetch(url,{
                method:"POST",
                body:formData
            }).then(response=>response.json())
            .then(data => {
                divVisitante.innerHTML = data;
            }).catch(err=>console.log(err))
        }
    });

    </script>