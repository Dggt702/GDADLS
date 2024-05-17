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
        $stmt->bindParam(":nombre_usuario",$usuario);
        $stmt->bindParam(":contrasenia",$contrasenia);

        if($respuesta = $stmt->execute()){
            if ($respuesta){
                $ret = true;
            }
        }
        return $ret;
    }

    public static function iniciarSesionArbitro($arbitro){
        $dni = $admin->getDNI();
        $contrasenia = $admin->getContrasenia();
        
        $ret = false;
        $sql = "SELECT * FROM arbitro WHERE dni =:dni AND contrasena =:contrasena";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":dni",$dni);
        $stmt->bindParam(":contrasena",$contrasenia);
        
        if($respuesta = $stmt->execute()){
            if ($respuesta){
                $ret = true;
            }
        }
        return $ret;
    }



}

?>