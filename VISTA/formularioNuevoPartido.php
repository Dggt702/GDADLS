<form class="d-flex justify-content-center mt-0" method="POST" action="../CONTROLADOR/crearArbitro.php" enctype="multipart/form-data">
    <div class="row g-3 w-75" id="insertarPartido">
        <h3 class="text-center">Nuevo Partido</h3>
        <div class="col-6 mb-3">
            <label for="temporada" class="form-label">Temporada</label>
            <select name="jornada" id="jornada" class="form-control" required>
                <option value="2020/21">2020/21</option>
                <option value="2021/22">2021/22</option>
                <option value="2022/23">2022/23</option>
                <option value="2023/24">2023/24</option>
                <option value="2024/25">2024/25</option>
            </select>
        </div>
        <div class="col-6 mb-3">
            <label for="jornada" class="form-label">Jornada</label>
            <select name="temporada" id="temporada" class="form-control" required>
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
            <label class="form-label">Estado</label>
            <input type="tel" class="form-control" name="telefono" placeholder="Ingrese el teléfono de contacto la persona" autocomplete="off" required>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Deporte</label>
            <input type="email" class="form-control" name="mail" placeholder="Ingrese el correo de contacto de la persona" autocomplete="off" required>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Categoría</label>
            <input type="email" class="form-control" name="mail" placeholder="Ingrese el correo de contacto de la persona" autocomplete="off" required>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Árbitro</label>
            <input type="email" class="form-control" name="mail" placeholder="Ingrese el correo de contacto de la persona" autocomplete="off" required>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Equipo Local</label>
            <input type="email" class="form-control" name="mail" placeholder="Ingrese el correo de contacto de la persona" autocomplete="off" required>
        </div>
        <div class="col-12 mb-3">
            <label class="form-label">Equipo Visitante</label>
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