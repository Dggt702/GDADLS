<form action="CONTROLADOR/acceder.php" class="row g-3 needs-validation justify-content-center" novalidate method="POST" id="formAdmin" style="display: none">
    
    <div class="col-12">
        <label for="nombreUsuario" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" autocomplete="username">
    </div>
    <div class="col-12">
        <label for="contraseniaAdmin" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contraseniaAdmin" name="contraseniaAdmin" autocomplete="current-password">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Acceder</button>
    </div>
    <?php if (isset($_GET["admin"]) && isset($_GET["admin"]) == "error") { ?>
        <div class="col-12 d-flex justify-content-center"><span class="fs-2 fs-sm-5 text-danger">El identificador o la contraseña no son correctos</span></div>
    <?php } ?>
</form>
