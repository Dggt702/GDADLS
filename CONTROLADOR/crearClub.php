<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once("../MODELO/Funciones.php");
require_once("../MODELO/Clases.php");

session_start();

if(isset($_SESSION["nombreUsuario"])){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nombre = $_POST["nombre"];
        $localizacion = $_POST["localizacion"];
        $deporte = $_POST["deporte"];
        $personaContacto = $_POST["personaContacto"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        $club = new Club("",$nombre,$localizacion,$deporte,$personaContacto,$telefono,$correo);
        if(Funciones::insertarClub($club)){

            /*
            $dni = $arbitro->getDni();
            $nombreArbitro = $arbitro->getNombre();
            $apellidosArbitro = $arbitro->getApellidos();

            $nombreImagen = $dni . "-" . $nombreArbitro . $apellidosArbitro;

            $target_path = "../fotosArbitros/";

            if (!file_exists($target_path)) {
                mkdir($target_path, 0700);
                chmod($target_path, 0777);
            }
            if(isset($_FILES["imageFile"])){
                $archivo = $_FILES["imageFile"];
                $nombre = $archivo["name"];
                $tipo = $archivo["type"];
                $tmp_name = $archivo['tmp_name'];
                $tamanio = $archivo['size'];

                //Mover el archivo a la carpeta
                if (move_uploaded_file($tmp_name, $target_path.$nombre)){
                    $info = pathinfo($nombre);
                    $extension = strtolower($info['extension']);
                    if (file_exists($target_path.$nombreImagen.".jpg")) 
                        unlink($target_path.$nombreImagen.".jpg");
                    elseif (file_exists($target_path.$nombreImagen.".png"))
                        unlink($target_path.$nombreImagen.".png");
                    elseif(file_exists($target_path.$nombreImagen.".jpeg"))
                        unlink($target_path.$nombreImagen.".jpeg");
                    rename($target_path.$nombre, $target_path.$nombreImagen.".".$extension);
                }
            }*/
            header("Location: ../VISTA/gestionarClubes.php");
        }else{
            echo "error";
        } 
    }
}