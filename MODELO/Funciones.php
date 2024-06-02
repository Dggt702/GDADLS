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
    
    public static function comprobarClub($nombre,$deporte){

        $conn = BBDD::conectar();
        $encontrado = false;
        $sql = "SELECT * FROM club WHERE nombre =:nombre AND deporte = :deporte";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":deporte",$deporte);
        
        if($stmt->execute()){
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($respuesta)){
                $encontrado = true;
            }
        }
        return $encontrado;
    }

    /*
    =================================
           OBTENCIÓN INDIVIDUAL
    =================================
    */

    public static function obtenerDeporte($id){        
        $conn = BBDD::conectar();
        $arrayDeportes = array();
        $sql = "SELECT * FROM deporte WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        
        if($stmt->execute()){
            $deportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($deportes as $elemento){
                    array_push($arrayDeportes,new Deporte($elemento["id"],$elemento["nombre"]));
                }
        }
        return $arrayDeportes;
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

    public static function obtenerArbitro($dni){

        $conn = BBDD::conectar();
        $arbitro = false;
        $sql = "SELECT * FROM arbitro WHERE dni =:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dni",$dni);

        if($stmt->execute()){
            $datosArbitro = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosArbitro)
                $arbitro = new Arbitro($datosArbitro["id"],$datosArbitro["nombre"],$datosArbitro["apellidos"],$datosArbitro["dni"],$datosArbitro["contrasenia"],$datosArbitro["telefono"],$datosArbitro["email"],$datosArbitro["disponibilidad"]);
        }
        return $arbitro;
    }

    /*
    =================================
             OBTENCIÓN PLURAL
    =================================
    */

    public static function obtenerDeportes(){        
        $conn = BBDD::conectar();
        $arrayDeportes = array();
        $sql = "SELECT * FROM deporte";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $deportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($deportes as $elemento){
                    array_push($arrayDeportes,new Deporte($elemento["id"],$elemento["nombre"]));
                }
        }
        return $arrayDeportes;
    }

    public static function obtenerArbitros(){        
        $conn = BBDD::conectar();
        $arrayArbitros = array();
        $sql = "SELECT * FROM arbitro";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $deportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($deportes as $datosArbitro){
                    array_push($arrayArbitros,new Arbitro($datosArbitro["id"],$datosArbitro["nombre"],$datosArbitro["apellidos"],$datosArbitro["dni"],$datosArbitro["contrasenia"],$datosArbitro["telefono"],$datosArbitro["email"],$datosArbitro["disponibilidad"]));
                }
        }
        return $arrayArbitros;
    }

    public static function obtenerPartidos(){        
        $conn = BBDD::conectar();
        $arrayPartidos = array();
        $sql = "SELECT * FROM partido";
        $stmt = $conn->prepare($sql);
        /*
        if($stmt->execute()){
            $deportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($deportes as $datosArbitro){
                    array_push($arrayPartidos,new Arbitro($datosArbitro["id"],$datosArbitro["nombre"],$datosArbitro["apellidos"],$datosArbitro["dni"],$datosArbitro["contrasenia"],$datosArbitro["telefono"],$datosArbitro["email"],$datosArbitro["disponibilidad"]));
                }
        }
        return $arrayPartidos;*/
    }

    public static function obtenerClubes(){        
        $conn = BBDD::conectar();
        $arrayClubes = array();
        $sql = "SELECT * FROM club";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $clubes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($clubes as $datosClub){
                    array_push($arrayClubes,new Club($datosClub["id"],$datosClub["nombre"],$datosClub["localizacion"],$datosClub["deporte"],$datosClub["persona_contacto"],$datosClub["telefono_contacto"],$datosClub["correo_contacto"]));
                }
        }
        return $arrayClubes;
    }

    public static function obtenerPueblos(){        
        $conn = BBDD::conectar();
        $arrayPueblos = array();
        $sql = "SELECT * FROM pueblo";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $pueblos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($pueblos as $datosPueblo){
                    array_push($arrayPueblos,new Pueblo($datosPueblo["id"],$datosPueblo["nombre"],$datosPueblo["codigo_postal"]));
                }
        }
        return $arrayPueblos;
    }   

    /*
    =================================
            INSERCIONES EN BBDD
    =================================
    */

    public static function insertarArbitro($arbitro){

        $insertado = false;
        $conn = BBDD::conectar();
        $sql = "INSERT INTO Arbitro(nombre,apellidos,dni,contrasenia,telefono,email,disponibilidad) VALUES(:nombre,:apellidos,:dni,:contrasenia,:telefono,:email,:disponibilidad)";
        $stmt = $conn->prepare($sql);

        $nombre = $arbitro->getNombre();
        $apellidos = $arbitro->getApellidos();
        $dni = $arbitro->getDni();
        $contrasenia = $arbitro->getContrasenia();
        $telefono = $arbitro->getTelefono();
        $email = $arbitro->getEmail();
        $disponibilidad = $arbitro->getDisponibilidad();
        
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellidos",$apellidos);
        $stmt->bindParam(":dni",$dni);
        $stmt->bindParam(":contrasenia",$contrasenia);
        $stmt->bindParam(":telefono",$telefono);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":disponibilidad",$disponibilidad);

        if(!self::comprobarArbitro($dni)){
            if($stmt->execute()){
                $insertado = true;
            }     
        }
        return $insertado;
    }

    public static function insertarClub($club){

        $insertado = false;
        $conn = BBDD::conectar();
        $sql = "INSERT INTO club(nombre,localizacion,deporte,persona_contacto,telefono_contacto,correo_contacto) VALUES(:nombre,:localizacion,:deporte,:persona_contacto,:telefono_contacto,:correo_contacto)";
        $stmt = $conn->prepare($sql);

        $nombre = $club->getNombre();
        $localizacion = $club->getLocalizacion();
        $deporte = $club->getDeporte();
        $personaContacto = $club->getPersonaContacto();
        $telefono = $club->getTelefonoContacto();
        $correo = $club->getCorreoContacto();
        
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":localizacion",$localizacion);
        $stmt->bindParam(":persona_contacto",$personaContacto);
        $stmt->bindParam(":telefono_contacto",$telefono);
        $stmt->bindParam(":correo_contacto",$correo);
        $stmt->bindParam(":deporte",$deporte);

        if(!self::comprobarClub($nombre,$deporte)){
            if($stmt->execute()){
                $insertado = true;
            }     
        }
        return $insertado;
    }

    public static function generadorContraseña(){
        $cadena = "";
        $caracteres = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $max = strlen($caracteres)-1;
        for($i = 0; $i < 8; $i++){
            $cadena .= substr($caracteres, mt_rand(0,$max), 1);
        }
        return $cadena;
    }

    public static function verificarContraseña($stored_hashed_password,$password){
        /**
         * Funcion para verificar contraseña codifiada con hash
         * Parámetros de entrada:
         *      1. Contraseña guardada en la BBDD
         *      2. Contraseña a verificar
         * Posibles valores que devuelve:
         *      1. True: si la contraseña es la misma
         *      2. False: si la contraseña es diferente
         *      3. $new_hashed_password: nuevo hash de la contraseña si el hash necesita ser actualizado
         */

        $correcta = false;

        // Verificar la contraseña
        if (password_verify($password, $stored_hashed_password)) {
            $correcta = true;
            
            // Verificar si el hash necesita ser actualizado (rehash)
            if (password_needs_rehash($stored_hashed_password, PASSWORD_DEFAULT)) {
                // Rehash la contraseña y actualizar el hash en la base de datos
                $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
                // Actualizar $new_hashed_password en la base de datos
                $correcta = $new_hashed_password;
            }
        }
    }

}