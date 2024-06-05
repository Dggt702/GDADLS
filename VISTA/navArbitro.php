<?php
    if(isset($_SESSION)) $id = Funciones::obtenerArbitro($_SESSION["id"]);
?>

<div class="d-flex flex-column p-3 text-start" style="width: 270px;">
    <a href="vistaArbitro.php" class="btn p-0"><h2>Inicio</h2></a>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li>
            <a href="gestionarPartidos.php" class="nav-link link-body-emphasis">
                Historial de Partidos
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center justify-content-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong><?php echo $id->getNombre()." ". $id->getApellidos()?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="perfilUsuario.php?id=<?php echo $usuario->getId() ?>">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../CONTROLADOR/cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
