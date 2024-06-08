<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once ("../MODELO/Funciones.php");

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["nombreUsuario"]) && isset($_POST["contraseniaAdmin"])){
        $nombreUsuario = $_POST["nombreUsuario"];
        $contraseniaAdmin = $_POST["contraseniaAdmin"];

        $contraseniaEncontrada = Funciones::comprobarSesionAdministrador($nombreUsuario);
        if(!$contraseniaEncontrada)
        header("Location: ../index.php?insert=error");
        else {
            if(password_verify($contraseniaAdmin, $contraseniaEncontrada)){
                $idAdmin = Funciones::obtenerAdministradorPorNombreUsuario($nombreUsuario)->getId();
                $_SESSION["idAdmin"] = $idAdmin;

                header("Location: ../VISTA/vistaAdmin.php");
            }else header("Location: ../index.php?insert=error");
        }
    }
    elseif(isset($_POST["identificador"]) && isset($_POST["contraseniaArbitro"])){
        $identificador = $_POST["identificador"];
        $contraseniaArbitro = $_POST["contraseniaArbitro"];
        
        $contraseniaEncontrada = Funciones::comprobarSesionArbitro($identificador);
        if(!$contraseniaEncontrada)
        header("Location: ../index.php?insert=error");
        else {
            if(password_verify($contraseniaArbitro, $contraseniaEncontrada)){
                $idArbitro = Funciones::obtenerArbitroPorDni($identificador)->getId();
                $_SESSION["idArbitro"] = $idArbitro;
                
                header("Location: ../VISTA/vistaArbitro.php"); 
            }else header("Location: ../index.php?insert=error");
        }
    }
}else header("Location: ../index.php");
