<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");
require_once("../MODELO/Clases.php");

if($_SERVER["REQUEST_METHOD"] === "GET"){

    $id = $_GET["id"];
    $nombre = $_GET["nombre"];
    $localizacion = $_GET["localizacion"];
    $polideportivo = $_GET["sede"];
    $deporte = $_GET["deporte"];
    $persona = $_GET["persona"];
    $telefono = $_GET["telefono"];
    $email = $_GET["email"];
    
    $arbitro = new Club($id,$nombre,$localizacion,$polideportivo,$deporte,$persona,$telefono,$email);
    
    if(Funciones::editarClub($arbitro)){
        echo FuncionesVista::pantallaDeOperacion("Se ha actualizado el club correctamente",true);
    }else header("Location: ../VISTA/perfilClub.php?id=".$id."&error=true");
    
}