<?php
    if(isset($_SESSION)) $admin = Funciones::obtenerAdministrador($_SESSION["nombreUsuario"]);
?>

<div class="d-flex flex-column p-3 text-start" style="width: 270px;">
    <a href="vistaAdmin.php" class="btn p-0"><h2>Inicio</h2></a>
    <hr>
    <ul class="nav nav-pills flex-column">
        <li>
            <a href="gestionarArbitros.php" class="nav-link link-body-emphasis">
                Gestionar Árbitros
            </a>
        </li>
        <li>
            <a href="gestionarPartidos.php" class="nav-link link-body-emphasis">
                Gestionar Partidos
            </a>
        </li>
        <li>
            <a href="gestionarClubes.php" class="nav-link link-body-emphasis">
                Gestionar Clubs
            </a>
        </li>
    </ul>
    <hr>
    <a class="btn" href="../CONTROLADOR/cerrarSesion.php">Cerrar sesión</a>
</div>

