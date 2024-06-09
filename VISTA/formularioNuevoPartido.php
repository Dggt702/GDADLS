<form class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearPartido.php" enctype="multipart/form-data">
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
        </div>
        <div class="col-6 mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" autocomplete="off" required>
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Deporte</label>
            <?php echo FuncionesVista::imprimirSelectDeportes("deporte","deporte") ?>
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Categoría</label>
            <?php echo FuncionesVista::imprimirSelectCategorias("categoria","categoria") ?>
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Árbitro</label>
            <?php echo FuncionesVista::imprimirSelectArbitrosDisponibles("arbitro","arbitro") ?>
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
        <button type="submit" class="btn btn-success">Añadir</button>
    </div>
</form>

<script>
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