<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");
require_once("../MODELO/Clases.php");

if($_SERVER["REQUEST_METHOD"] === "GET"){

    $id = $_GET["id"];
    $nombre = $_GET["nombre"];
    $persona = $_GET["persona"];
    $telefono = $_GET["telefono"];
    $email = $_GET["email"];
    
    $club = new Club($id,$nombre,"","",$persona,$telefono,$email,"");
    
    if(Funciones::editarClub($club)){
        echo FuncionesVista::pantallaDeOperacion("Se ha actualizado el club correctamente",true);
    }else echo FuncionesVista::pantallaDeOperacion("No se ha podido actualizar el club",false);
    
}