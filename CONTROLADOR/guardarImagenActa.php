<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require("../MODELO/Funciones.php");

session_start();var_dump($_SESSION);
if(isset($_SESSION['idArbitro']))
    $idArbitro = $_SESSION['idArbitro'];
else header('Location ../index.php');

$idPartido = $_POST["idPartido"];

$target_path = "../fotosActas/";

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
        if (file_exists($target_path.$idPartido.".jpg")) 
            unlink($target_path.$idPartido.".jpg");
        elseif (file_exists($target_path.$idPartido.".png"))
            unlink($target_path.$idPartido.".png");
        elseif(file_exists($target_path.$idPartido.".jpeg"))
            unlink($target_path.$idPartido.".jpeg");
        rename($target_path.$nombre, $target_path.$idPartido.".".$extension);
    }
    header("Location: ../VISTA/historialPartidos.php");
}else{
    header("Location: ../VISTA/historialPartidos.php");
}
