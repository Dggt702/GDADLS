<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

/*      Para guardar las fotos por DNI dentro de la carpeta de sus respectivas empresas
$id = $_POST["id"];
$dni = $_POST["dniPersona"];
$empresa = str_replace(" ","_",$_POST['empresaPersona']);
          
$target_path = "../fotosArbitros/" . $empresa . "/";


//  Aquí comprobamos si existe la carpeta donde vamos a subir el archivo 
$filename = '../imagenesPerfil/' . $empresa;

if (!file_exists($filename)) {
    mkdir($filename, 0700);
    chmod($filename, 0777);
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
        if (file_exists($target_path.$dni.".jpg")) 
            unlink($target_path.$dni.".jpg");
        elseif (file_exists($target_path.$dni.".png"))
            unlink($target_path.$dni.".png");
        elseif(file_exists($target_path.$dni.".jpeg"))
            unlink($target_path.$dni.".jpeg");
        rename($target_path.$nombre, $target_path.$dni.".".$extension);
    }
}
header("Location: ../VISTA/perfil.php?id=".$id."");
*/
require("../MODELO/Funciones.php");


$dni = $_POST["dni"];
$arbitro = Funciones::obtenerArbitroPorDni($dni);
$nombreApellidos = $arbitro->getNombre().$arbitro->getApellidos();

$imagenNombre= $dni."-".$nombreApellidos;

$target_path = "../fotosArbitros/";

//  Aquí comprobamos si existe la carpeta donde vamos a subir el archivo 
$filename = '../fotosArbitros/';

if (!file_exists($filename)) {
    mkdir($filename, 0700);
    chmod($filename, 0777);
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
    header("Location: ../VISTA/perfilArbitro.php?dni=".$dni."");
}else{
    header("Location: ../VISTA/perfilArbitro.php?dni=".$dni."&error=error");
}
