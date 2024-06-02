<?php

require_once("../MODELO/Funciones.php");

$dniArbitro = $_POST["dni"];

if (move_uploaded_file($tmp_name, $target_path.$nombre)){
    $info = pathinfo($nombre);
    $extension = strtolower($info['extension']);
    if (file_exists($target_path.$imagenNombre.".jpg")) 
        unlink($target_path.$imagenNombre.".jpg");
    elseif (file_exists($target_path.$imagenNombre.".png"))
        unlink($target_path.$imagenNombre.".png");
    elseif(file_exists($target_path.$imagenNombre.".jpeg"))
        unlink($target_path.$imagenNombre.".jpeg");
        elseif(file_exists($target_path.$imagenNombre.".gif"))
        unlink($target_path.$imagenNombre.".gif");
    rename($target_path.$nombre, $target_path.$imagenNombre.".".$extension);
}

?>