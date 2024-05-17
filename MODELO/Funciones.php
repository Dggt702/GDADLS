<?php

require_once("Clases.php");

class Funciones{

    public $conn = BBDD::conectar();

    public static function comprobarSesionAdministrador($admin){
       
        $ret = false;
        $sql = "SELECT contrasenia FROM administrador WHERE nombre_usuario =:nombre_usuario";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":nombre_usuario",$admin);

        if($stmt->execute()){
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($respuesta)){
                $ret = $respuesta["contrasenia"];
            }
        }
        return $ret;
    }

    public static function comprobarSesionArbitro($dni){
        $ret = false;
        $sql = "SELECT contrasena FROM arbitro WHERE dni =:dni";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(":dni",$dni);
        
        if($stmt->execute()){
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($respuesta)){
                $ret = $respuesta["contrasena"];
            }
        }
        return $ret;
    }



}

?>