<?php

require_once("Clases.php");

class Funciones{

    public static function comprobarSesionAdministrador($admin){
        
        $conn = BBDD::conectar();
        $ret = false;
        $sql = "SELECT contrasenia FROM administrador WHERE nombre_usuario =:nombre_usuario";
        $stmt = $conn->prepare($sql);
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

        $conn = BBDD::conectar();
        $ret = false;
        $sql = "SELECT contrasena FROM arbitro WHERE dni =:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dni",$dni);
        
        if($stmt->execute()){
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($respuesta)){
                $ret = $respuesta["contrasena"];
            }
        }
        return $ret;
    }

    public static function comprobarArbitro($dni){

        $conn = BBDD::conectar();
        $encontrado = false;
        $sql = "SELECT * FROM arbitro WHERE dni =:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dni",$dni);
        
        if($stmt->execute()){
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($respuesta)){
                $encontrado = true;
            }
        }
        return $encontrado;
    }


    public static function obtenerUsuario($nombreUsuario){

        $conn = BBDD::conectar();
        $admin = false;
        $sql = "SELECT * FROM administrador WHERE nombre_usuario =:nombreUsuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nombreUsuario",$nombreUsuario);

        if($stmt->execute()){
            $datosAdmin = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosAdmin)
                $admin = new Administrador($datosAdmin["id"],$datosAdmin["nombre_usuario"],$datosAdmin["contrasenia"]);
        }

        return $admin;
    }

    public static function insertarArbitro($arbitro){

        $insertado = false;
        $conn = BBDD::conectar();
        $sql = "INSERT INTO Arbitro(nombre,apellidos,dni,contrasenia,email,disponibilidad) VALUES(:nombre,:apellidos,:dni,:telefono,:email,:disponibilidad)";
        $stmt = $conn->prepare($sql);

        $nombre = $arbitro->getName();
        $apellido = $arbitro->getLastName();
        $dni = $arbitro->getDni();
        $telefono = $arbitro->getTel();
        $correo = $arbitro->getEmail();
        $idEmpresa = $arbitro->getIdEmpresa();
        $cargo = $arbitro->getCargo();
        
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellidos",$apellido);
        $stmt->bindParam(":dni",$dni);
        $stmt->bindParam(":telefono",$telefono);
        $stmt->bindParam(":correo",$correo);
        $stmt->bindParam(":id_empresa",$idEmpresa);
        $stmt->bindParam(":cargo",$cargo);

        if(self::comprobarArbitro($dni)){
            if($stmt->execute()){
                $insertado = true;
            }     
        }
        return $insertado;
    }

}