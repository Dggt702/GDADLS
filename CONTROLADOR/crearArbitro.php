<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once("../MODELO/Funciones.php");
require_once("../MODELO/Arbitro.php");

session_start();

if(isset($_SESSION["nombreUsuario"])){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $contrasenia = Funciones::generadorContraseña();
        $hashed_password = password_hash($contrasenia,PASSWORD_DEFAULT);
        $telefono = $_POST["telefono"];
        $mail = $_POST["mail"];

        $arbitro = new Arbitro("",$nombre,$apellidos,$dni,$hashed_password,$telefono,$mail,"DISPONIBLE");
        if(Funciones::insertarArbitro($arbitro)){

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
            }
            header("Location: ../VISTA/gestionarArbitros.php");
        }else{
            echo "error";
        } 
    }
}