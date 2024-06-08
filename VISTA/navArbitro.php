<?php
    if(isset($_SESSION)) $arbitro = Funciones::obtenerArbitro($_SESSION["idArbitro"]);
?>

<div class="d-flex flex-column p-3 text-start" style="width: 270px;">
    <a href="vistaArbitro.php" class="btn p-0"><h2>Inicio</h2></a>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li>
            <a href="" class="nav-link link-body-emphasis">
                Historial de Partidos
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center justify-content-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong><?php echo $arbitro->getNombre()." ". $arbitro->getApellidos()?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="perfilArbitro.php?id=<?php echo $arbitro->getId() ?>">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../CONTROLADOR/cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </div>
</div>

