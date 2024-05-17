<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["nombreUsuario"]) && isset($_POST["contraseniaAdmin"])){
        $nombreUsuario = $_POST["nombreUsuario"];
        $contraseniaAdmin = $_POST["contraseniaAdmin"];

        $contraseniaEncontrada = Funciones::comprobarContraseñaAdministrador($nombreUsuario);
        if(!$contraseniaEncontrada)
            header("Location: ../index.php");
        else {
            if(password_verify($contraseniaAdmin, $contraseniaEncontrada))
                header("Location: ../VISTA/vistaAdmin.php");
            else header("Location: ../index.php");
        }
    }
    elseif(isset($_POST["identificador"]) && isset($_POST["contraseniaArbitro"])){
        $identificador = $_POST["identificador"];
        $contraseniaArbitro = $_POST["contraseniaArbitro"];
        
        $contraseniaEncontrada = Funciones::comprobarContraseñaArbitro($identificador);
        if(!$contraseniaEncontrada)
            header("Location: ../index.php");
        else {
            if(password_verify($contraseniaArbitro, $contraseniaEncontrada))
                header("Location: ../VISTA/vistaAdmin.php");
            else header("Location: ../index.php");
        }
    }
}
