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
        $sql = "SELECT contrasenia FROM arbitro WHERE dni =:dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dni",$dni);
        
        if($stmt->execute()){
            $respuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($respuesta)){
                $ret = $respuesta["contrasenia"];
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
            $datosDeporte = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosDeporte)
                $deporte = new Deporte($datosDeporte["id"],$datosDeporte["nombre"]);
        }
        return $deporte;
    }

    public static function obtenerAdministrador($id){
        $conn = BBDD::conectar();
        $admin = false;
        $sql = "SELECT * FROM administrador WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datosAdmin = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosAdmin)
                $admin = new Administrador($datosAdmin["id"],$datosAdmin["nombre_usuario"],$datosAdmin["contrasenia"]);
        }
        return $admin;
    }

    public static function obtenerAdministradorPorNombreUsuario($nombreUsuario){
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

    public static function obtenerClub($id){
        $conn = BBDD::conectar();
        $club = false;
        $sql = "SELECT * FROM club WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($datos as $datosClub){
                    $club = new Club($datosClub["id"],$datosClub["nombre"],$datosClub["localizacion"],$datosClub["deporte"],$datosClub["persona_contacto"],$datosClub["telefono_contacto"],$datosClub["correo_contacto"],$datosClub["polideportivo"]);
                }
        }

        return $club;
    }

    public static function obtenerArbitro($id){
        $conn = BBDD::conectar();
        $arbitro = false;
        $sql = "SELECT * FROM arbitro WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datosArbitro = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosArbitro)
                $arbitro = new Arbitro($datosArbitro["id"],$datosArbitro["nombre"],$datosArbitro["apellidos"],$datosArbitro["dni"],$datosArbitro["contrasenia"],$datosArbitro["telefono"],$datosArbitro["email"],$datosArbitro["disponibilidad"]);
        }
        return $arbitro;
    }

    public static function obtenerArbitroPorDni($dni){
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

    public static function obtenerPueblo($id){
        $conn = BBDD::conectar();
        $pueblo = false;
        $sql = "SELECT * FROM pueblo WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datosPueblo = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosPueblo)
                $pueblo = new Pueblo($datosPueblo["id"],$datosPueblo["nombre"],$datosPueblo["codigo_postal"]);
        }
        return $pueblo;
    }
    
    public static function obtenerPartido($id){
        $conn = BBDD::conectar();
        $partido = false;
        $sql = "SELECT * FROM partido WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datosPartido = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosPartido)
                $partido = new Partido($datosPartido["id"],$datosPartido["jornada"],$datosPartido["temporada"],$datosPartido["fecha"],$datosPartido["estado"],$datosPartido["deporte"],$datosPartido["categoria"],$datosPartido["arbitro"],$datosPartido["local"],$datosPartido["visitante"]);
        }
        return $partido;
    }

    public static function obtenerCategoria($id){
        $conn = BBDD::conectar();
        $categoria = false;
        $sql = "SELECT * FROM categoria WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datosCategoria = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosCategoria)
                $categoria = new Categoria($datosCategoria["id"],$datosCategoria["descripcion"]);
        }
        return $categoria;
    }

    public static function obtenerPolideportivo($id){
        $conn = BBDD::conectar();
        $polideportivo = false;
        $sql = "SELECT * FROM polideportivo WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            $datosPolideportivo = $stmt->fetch(PDO::FETCH_ASSOC);
            if($datosPolideportivo)
                $polideportivo = new Polideportivo($datosPolideportivo["id"],$datosPolideportivo["ubicacion"]);
        }
        return $polideportivo;
    }

    /*
    =================================
             OBTENCIÓN PLURAL
    =================================
    */

    //*** SIN FILTRO ***//

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

    public static function obtenerIncidenciaPorArbitros($idArbitro){
        $conn = BBDD::conectar();
        $arrayIncidencias = array();
        if(!empty($idArbitro)){
            $sql = "SELECT * FROM incidencia WHERE id_arbitro = :idArbitro";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":idArbitro",$idArbitro);
        }else{
            $sql = "SELECT * FROM incidencia";
            $stmt = $conn->prepare($sql);
        }
        
        if($stmt->execute()){
            $incidencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($incidencias as $elemento){
                    array_push($arrayIncidencias,new Incidencia($elemento["id"],$elemento["id_arbitro"],$elemento["comentario"]));
                }
        }
        return $arrayIncidencias;
    }

    public static function obtenerArbitros(){        
        $conn = BBDD::conectar();
        $arrayArbitros = array();
        $sql = "SELECT * FROM arbitro ORDER BY nombre,apellidos";
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
        
        if($stmt->execute()){
            $partidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($partidos as $datosPartido){
                    array_push($arrayPartidos,new Partido($datosPartido["id"],$datosPartido["jornada"],$datosPartido["temporada"],$datosPartido["fecha"],$datosPartido["estado"],$datosPartido["deporte"],$datosPartido["categoria"],$datosPartido["arbitro"],$datosPartido["local"],$datosPartido["visitante"]));
                }
        }
        return $arrayPartidos;
    }

    public static function obtenerClubes(){        
        $conn = BBDD::conectar();
        $arrayClubes = array();
        $sql = "SELECT * FROM club ORDER BY nombre";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $clubes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($clubes as $datosClub){
                    array_push($arrayClubes,new Club($datosClub["id"],$datosClub["nombre"],$datosClub["localizacion"],$datosClub["deporte"],$datosClub["persona_contacto"],$datosClub["telefono_contacto"],$datosClub["correo_contacto"],$datosClub["polideportivo"]));
                }
        }
        return $arrayClubes;
    }

    public static function obtenerPueblos(){        
        $conn = BBDD::conectar();
        $arrayPueblos = array();
        $sql = "SELECT * FROM pueblo ORDER BY nombre";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $pueblos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($pueblos as $datosPueblo){
                    array_push($arrayPueblos,new Pueblo($datosPueblo["id"],$datosPueblo["nombre"],$datosPueblo["codigo_postal"]));
                }
        }
        return $arrayPueblos;
    }   

    public static function obtenerCateorias(){        
        $conn = BBDD::conectar();
        $arrayCategoria = array();
        $sql = "SELECT * FROM categoria ORDER BY id";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($categorias as $datosCategorias){
                    array_push($arrayCategoria,new Categoria($datosCategorias["id"],$datosCategorias["descripcion"]));
                }
        }
        return $arrayCategoria;
    }
    
    public static function obtenerPolideportivos(){        
        $conn = BBDD::conectar();
        $arrayPolideportivos = array();
        $sql = "SELECT * FROM polideportivo ORDER BY id";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $polideportivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($polideportivos as $datosPolideportivos){
                    array_push($arrayPolideportivos,new Polideportivo($datosPolideportivos["id"],$datosPolideportivos["ubicacion"]));
                }
        }
        return $arrayPolideportivos;
    }

    //*** CON FILTRO ***//


    public static function obtenerArbitrosDisponibles(){        
        $conn = BBDD::conectar();
        $arrayArbitros = array();
        $sql = "SELECT * FROM arbitro WHERE disponibilidad = 'DISPONIBLE' ORDER BY nombre, apellidos";
        $stmt = $conn->prepare($sql);

        if($stmt->execute()){
            $deportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($deportes as $datosArbitro){
                    array_push($arrayArbitros,new Arbitro($datosArbitro["id"],$datosArbitro["nombre"],$datosArbitro["apellidos"],$datosArbitro["dni"],$datosArbitro["contrasenia"],$datosArbitro["telefono"],$datosArbitro["email"],$datosArbitro["disponibilidad"]));
                }
        }
        return $arrayArbitros;
    }

    public static function obtenerClubesDeporte($idDeporte){        
        $conn = BBDD::conectar();
        $arrayClubes = array();
        $sql = "SELECT * FROM club WHERE deporte = :deporte ORDER BY nombre";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":deporte",$idDeporte);

        if($stmt->execute()){
            $clubes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($clubes as $datosClub){
                    array_push($arrayClubes,new Club($datosClub["id"],$datosClub["nombre"],$datosClub["localizacion"],$datosClub["deporte"],$datosClub["persona_contacto"],$datosClub["telefono_contacto"],$datosClub["correo_contacto"],$datosClub["polideportivo"]));
                }
        }
        return $arrayClubes;
    }

    public static function obtenerPartidosArbitro($idArbitro){        
        $conn = BBDD::conectar();
        $arrayPartidos = array();
        $sql = "SELECT * FROM partido WHERE arbitro = :arbitro ORDER BY fecha";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":arbitro",$idArbitro);

        if($stmt->execute()){
            $partidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($partidos as $datosArbitro){
                    array_push($arrayPartidos,new Partido($datosArbitro["id"],$datosArbitro["jornada"],$datosArbitro["temporada"],$datosArbitro["fecha"],$datosArbitro["estado"],$datosArbitro["deporte"],$datosArbitro["categoria"],$datosArbitro["arbitro"],$datosArbitro["local"],$datosArbitro["visitante"]));
                }
        }
        return $arrayPartidos;
    }



    public static function obtenerArbitrosPorBusqueda($busqueda){
        $columnas = ["nombre","apellidos","dni","telefono"];

        $conn = BBDD::conectar();
        $campo = "%".$busqueda."%";
        $sql = "SELECT * FROM arbitro ";
        $where = "WHERE (";
        $numCol = count($columnas);
        for($i = 0; $i < $numCol; $i++){
            $where.= $columnas[$i]." LIKE :campo OR ";
        }
        $where = substr_replace($where,"",-3);
        $where.=")";

        $sql.=$where." ORDER BY nombre ASC";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":campo",$campo);
        $arrayArbitros = array();

        if($stmt->execute()){
            $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($ret as $arbitro){
                array_push($arrayArbitros, new Arbitro($arbitro["id"],$arbitro["nombre"],$arbitro["apellidos"],$arbitro["dni"],$arbitro["contrasenia"],$arbitro["telefono"],$arbitro["email"],$arbitro["disponibilidad"]));
            }
        }
        return $arrayArbitros;
    }

    public static function obtenerClubesPorBusquedaPorDeporte($busqueda,$deporte){
        $columnas = ["nombre"];
        $conn = BBDD::conectar();
        $campo = "%".$busqueda."%";
        $sql = "SELECT * FROM club ";
        if(!empty($deporte)){
            $where = "WHERE deporte = :deporte AND (";
        }else{
            $where = "WHERE(";
        }
        
        $numCol = count($columnas);
        for($i = 0; $i < $numCol; $i++){
            $where.= $columnas[$i]." LIKE :campo OR ";
        }
        $where = substr_replace($where,"",-3);
        $where.=")";

        $sql.=$where." ORDER BY nombre ASC";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":campo",$campo);
        if(!empty($deporte))$stmt->bindParam(":deporte",$deporte);

        $arrayClubs = array();

        if($stmt->execute()){
            $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($ret as $club){
                array_push($arrayClubs, new Club($club["id"],$club["nombre"],$club["localizacion"],$club["deporte"],$club["persona_contacto"],$club["telefono_contacto"],$club["correo_contacto"],$club["polideportivo"]));
            }
        }
        return $arrayClubs;
    }

    public static function obtenerPartidosPorDeporte($deporte){
        $conn = BBDD::conectar();
        
        if(!empty($deporte)){
            $sql = "SELECT * FROM partido WHERE deporte = :deporte";   
        }else{
            $sql = "SELECT * FROM partido";
        } 
        $stmt = $conn->prepare($sql);
        if(!empty($deporte))$stmt->bindParam(":deporte",$deporte);
        $arrayPartidos = array();

        if($stmt->execute()){
            $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($ret as $partido){
                array_push($arrayPartidos, new Partido($partido["id"],$partido["jornada"],$partido["temporada"],$partido["fecha"],$partido["estado"],$partido["deporte"],$partido["categoria"],$partido["arbitro"],$partido["local"],$partido["visitante"]));
            }
        }
        return $arrayPartidos;
    }

    /*
    =================================
            INSERCIONES EN BBDD
    =================================
    */

    public static function insertarArbitro($arbitro){

        $insertado = false;
        $conn = BBDD::conectar();
        $sql = "INSERT INTO arbitro(nombre,apellidos,dni,contrasenia,telefono,email,disponibilidad) VALUES(:nombre,:apellidos,:dni,:contrasenia,:telefono,:email,:disponibilidad)";
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

    public static function enviarIncidencia($incidencia){
        $conn = BBDD::conectar();
        $sql = "INSERT INTO incidencia(id_arbitro,comentario) VALUES(:id_arbitro,:comentario)";
        $ret = false;
        $stmt = $conn->prepare($sql);

        $idArbitro = $incidencia->getIdArbitro();
        $comentario = $incidencia->getComentario();

        $stmt->bindParam(":id_arbitro",$idArbitro);
        $stmt->bindParam(":comentario",$comentario);

        if($stmt->execute()){
            $ret = true;
        }

        return $ret;     
    }

    public static function insertarClub($club){

        $insertado = false;
        $conn = BBDD::conectar();
        $sql = "INSERT INTO club(nombre,localizacion,deporte,persona_contacto,telefono_contacto,correo_contacto,polideportivo) VALUES(:nombre,:localizacion,:deporte,:persona_contacto,:telefono_contacto,:correo_contacto,:polideportivo)";
        $stmt = $conn->prepare($sql);

        $nombre = $club->getNombre();
        $localizacion = $club->getLocalizacion();
        $deporte = $club->getDeporte();
        $personaContacto = $club->getPersonaContacto();
        $telefono = $club->getTelefonoContacto();
        $correo = $club->getCorreoContacto();
        $polideportivo = $club->getPolideportivo();
        
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":localizacion",$localizacion);
        $stmt->bindParam(":deporte",$deporte);
        $stmt->bindParam(":persona_contacto",$personaContacto);
        $stmt->bindParam(":telefono_contacto",$telefono);
        $stmt->bindParam(":correo_contacto",$correo);
        $stmt->bindParam(":polideportivo",$polideportivo);

        if(!self::comprobarClub($nombre,$deporte)){
            if($stmt->execute()){
                $insertado = true;
            }     
        }
        return $insertado;
    }

    public static function insertarPartido($partido){

        $insertado = false;
        $conn = BBDD::conectar();
        $sql = "INSERT INTO partido(jornada,temporada,fecha,estado,deporte,categoria,arbitro,local,visitante) VALUES(:jornada,:temporada,:fecha,:estado,:deporte,:categoria,:arbitro,:local,:visitante)";
        $stmt = $conn->prepare($sql);

        $jornada = $partido->getJornada();
        $temporada = $partido->getTemporada();
        $fecha = $partido->getFecha();
        $estado = $partido->getEstado();
        $deporte = $partido->getDeporte();
        $categoria = $partido->getCategoria();
        $arbitro = $partido->getArbitro();
        $local = $partido->getLocal();
        $visitante = $partido->getVisitante();
        
        $stmt->bindParam(":jornada",$jornada);
        $stmt->bindParam(":temporada",$temporada);
        $stmt->bindParam(":fecha",$fecha);
        $stmt->bindParam(":estado",$estado);
        $stmt->bindParam(":deporte",$deporte);
        $stmt->bindParam(":categoria",$categoria);
        $stmt->bindParam(":arbitro",$arbitro);
        $stmt->bindParam(":local",$local);
        $stmt->bindParam(":visitante",$visitante);

        if($stmt->execute()){
            $insertado = true;
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

    public static function crearToken($idArbitro){
        $conn = BBDD::conectar();

        $token = bin2hex(random_bytes(16));
        $fechaExpiracion = date('Y-m-d H:i:s', strtotime('+30 minutes'));

        $sql = "INSERT INTO password_token (id_arbitro,token,fecha_exp) VALUES (:id_arbitro,:token,:fecha_expiracion)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id_arbitro",$idArbitro);
        $stmt->bindParam(":token",$token);
        $stmt->bindParam(":fecha_expiracion",$fechaExpiracion);
        
        $stmt->execute() ? $ret = $token : $ret = false;

        return $ret;
    }

    public static function expirarToken($token){
        $conn = BBDD::conectar();

        $fechaExpiracion = date('Y-m-d H:i:s', strtotime('now'));

        $sql = "UPDATE password_token fecha_expiracion=:fecha_expiracion WHERE token=:token";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":token",$token);
        $stmt->bindParam(":fecha_expiracion",$fechaExpiracion);
        
        $stmt->execute() ? $ret = $token : $ret = false;

        return $ret;
    }

    public static function buscarToken($token){
        $conn = BBDD::conectar();

        $sql = "SELECT * FROM password_token WHERE token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":token",$token);
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($result))
            $result = false;
        
        return $result;
    }

    /*
    =================================
          ELIMINAR DE LA  BBDD
    =================================
    */

    public static function eliminarArbitro($id){
        $conn = BBDD::conectar();
        $sql = "DELETE FROM arbitro WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $eliminado = false;

        if($stmt->execute()){
            $eliminado = true;
        }     
    
        return $eliminado;

    }

     /*
    =================================
          ACTUALIZAR DE LA  BBDD
    =================================
    */

    public static function editarArbitro($arbitro){

        $id = $arbitro->getId();
        $nombre = $arbitro->getNombre();
        $apellidos = $arbitro->getApellidos();
        $tel = $arbitro->getTelefono();
        $email = $arbitro->getEmail();
        $disponibilidad = $arbitro->getDisponibilidad();

        $conn = BBDD::conectar();
        $sql = "UPDATE arbitro SET nombre = :nombre, apellidos = :apellidos, telefono=:telefono, email=:email, disponibilidad=:disponibilidad WHERE id=:id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellidos",$apellidos);
        $stmt->bindParam(":telefono",$tel);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":disponibilidad",$disponibilidad);
        $ret = false;

        if($stmt->execute()){
            $ret=true;
        }
        return $ret;
    }

    public static function comprobarContraseniaAdmin($admin){

        $encontrado = false;
        $id = $admin->getId();
        $contrasenia = $admin->getContrasenia();

        $conn = BBDD::conectar();

        $sql = "SELECT * FROM administrador WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        
        if($stmt->execute()){
            $valoresAdmin = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(empty($valoresAdmin)){
                $encontrado = false;
            }elseif(password_verify($contrasenia,$valoresAdmin["contrasenia"]))
                $encontrado = true;
        }
        return $encontrado;
    }

    public static function comprobarContraseniaArbitro($arbitro){

        $encontrado = false;
        $id = $arbitro->getId();
        $contrasenia = $arbitro->getContrasenia();

        $conn = BBDD::conectar();

        $sql = "SELECT * FROM arbitro WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        
        if($stmt->execute()){
            $valoresArbitro = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($contrasenia,$valoresArbitro["contrasenia"])){
                $encontrado = true;
            }
        }
        return $encontrado;
    }

    public static function cambiarContraseniaAdmin($admin, $new_hashed_password){
        $id = $admin->getId();

        $conn = BBDD::conectar();
        $sql = "UPDATE administrador SET contrasenia = :newPassword WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":newPassword",$new_hashed_password);

        $ret = false;

        if($stmt->execute()){
            $ret = true;
        }
        return $ret;
    }

    public static function cambiarContraseniaArbitro($arbitro, $new_hashed_password){
        $id = $arbitro->getId();

        $conn = BBDD::conectar();
        $sql = "UPDATE arbitro SET contrasenia = :newPassword WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":newPassword",$new_hashed_password);

        $ret = false;

        if($stmt->execute()){
            $ret = true;
        }
        return $ret;
    }
}