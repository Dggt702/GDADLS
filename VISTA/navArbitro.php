<?php
    if(isset($_SESSION)) $arbitro = Funciones::obtenerArbitro($_SESSION["idArbitro"]);
?>
<nav class="border-bottom border-secondary p-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
            <div class="col-1 d-flex align-items-center mb-2 mb-lg-0">
                <img src="https://www.adsierra.es/wp-content/uploads/2020/08/LOGO-FINAL-ADS.png" alt="" class="img-fluid">
            </div>

            <ul class="nav col-6 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="vistaArbitro.php" class="nav-link px-2 fw-bold link-body-emphasis">Inicio</a></li>
                <li><a href="#" class="nav-link px-2">Historial de partidos</a></li>
            </ul>

            <div class="col-5 dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong><?php echo $arbitro->getNombre()." ". $arbitro->getApellidos()?></strong>
                </a>
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle d-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="perfilArbitro.php?id=<?php echo $arbitro->getId() ?>">Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../CONTROLADOR/cerrarSesion.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>


