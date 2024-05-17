<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["nombreUsuario"]) && isset($_POST["contraseniaAdmin"])){
        $nombreUsuario = $_POST["nombreUsuario"];
        $contraseniaAdmin = $_POST["contraseniaAdmin"];
        $psswrdHashedAdmin = password_hash($contraseniaAdmin, PASSWORD_DEFAULT);

        $admin = new Administrador("",$nombreUsuario,$psswrdHashedAdmin);
        Funciones::iniciarSesionAdministrador($admin) ? header("Location: ../VISTA/vistaAdmin.php") : header("Location: ../index.php");
    }
    if(isset($_POST["identificador"]) && isset($_POST["contraseniaArbitro"])){
        $identificador = $_POST["identificador"];
        $contraseniaArbitro = $_POST["contraseniaArbitro"];
        $psswrdHashedArbitro = password_hash($contraseniaArbitro, PASSWORD_DEFAULT);

        $arbitro = new Arbitro("","","",$identificador,$psswrdHashedArbitro,"","");
        Funciones::iniciarSesionAdministrador($arbitro) ? header("Location: ../VISTA/vistaArbitro.php") : header("Location: ../index.php");
    }
}
