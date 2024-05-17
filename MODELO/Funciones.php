<?php

require_once("Clases.php");

class Funciones{

    public $conn = BBDD::conectar();

    public static function iniciarSesionAdministrador($admin){
        $usuario = $admin->getNombreUsuario();
        $contrasenia = $admin->getContrasenia();
        
        $ret = false;
        $sql = "SELECT * FROM administrador WHERE nombre_usuario =:nombre_usuario AND contrasenia =:contrasenia";
        $stmt = self::$conn->prepare($sql);
        
        if($respuesta = $stmt->execute()){
            if ($respuesta){
                $ret = true;
            }
        }
        return $ret;
    }

    public static function iniciarSesionArbitro($arbitro){
        $arbitro = $admin->getNombreUsuario();
        $contrasenia = $admin->getContrasenia();
        
        $ret = false;
        $sql = "SELECT * FROM arbitro WHERE nombre_usuario =:nombre_usuario AND contrasenia =:contrasenia";
        $stmt = self::$conn->prepare($sql);
        
        if($respuesta = $stmt->execute()){
            if ($respuesta){
                $ret = true;
            }
        }
        return $ret;
    }



}

?>