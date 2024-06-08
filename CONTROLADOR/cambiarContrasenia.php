<?php 
require_once '../MODELO/Funciones.php';
require_once '../VISTA/FuncionesVista.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST["token"])){
        $token = $_POST["token"];

        $dni = $_POST["identificador"];
        $arbitro = Funciones::obtenerArbitroPorDni($dni);
        $contrasenia = $_POST["contrasenia"];
        $hashed_password = password_hash($contrasenia,PASSWORD_DEFAULT);

        if($usuario){
            Funciones::cambiarContraseniaArbitro($arbitro, $hashed_password);
            Funciones::expirarToken($token);
            header("Location: ../index.php?cambio=true");
        }else header("Location: ../VISTA/recuperarContrasenia.php?token=".$token."&error=true");
    }
    elseif(isset($_POST["idAdmin"])){
        $idAdmin = $_POST["idAdmin"];
        $password = $_POST["password"];

        $newPassword = $_POST["newPassword"];
        $newHashed_password = password_hash($newPassword,PASSWORD_DEFAULT);

        $administrador = new Administrador($idAdmin,'',$password);

        if(Funciones::comprobarContraseniaAdmin($administrador)){
            if(Funciones::cambiarContraseniaAdmin($administrador, $newHashed_password)){
                header("Location: ../index.php?cambio=true");
            }else FuncionesVista::pantallaDeOperacion("Ha ocurrido un error",false);
        }else header("Location: ../VISTA/perfilAdmin.php?id=".$idAdmin."&contrasenia=false");
    }
    elseif(isset($_POST["idArbitro"])){
        $idArbitro = $_POST["idArbitro"];
        $password = $_POST["password"];

        $newPassword = $_POST["newPassword"];
        $newHashed_password = password_hash($newPassword,PASSWORD_DEFAULT);

        $arbitro = new Arbitro($idArbitro,'',$password,'','','','','');

        if(Funciones::comprobarContraseniaArbitro($arbitro)){
            if(Funciones::cambiarContraseniaArbitro($arbitro, $newHashed_password)){
                header("Location: ../index.php?cambio=true");
            }else FuncionesVista::pantallaDeOperacion("Ha ocurrido un error",false);
        }else header("Location: ../VISTA/perfilArbitro.php?id=".$idArbitro."&contrasenia=false");
    }
}