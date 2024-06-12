<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");
require_once("../MODELO/Clases.php");

if($_SERVER["REQUEST_METHOD"] === "GET"){

    $id = $_GET["id"];
    $fecha = $_GET["fecha"];
    
    $arbitro = new Partido($id,"","",$fecha,"","","","","","");
    
    if(Funciones::editarPartido($arbitro)){
        echo FuncionesVista::pantallaDeOperacion("Se ha actualizado el partido correctamente",true);
    }else echo FuncionesVista::pantallaDeOperacion("No se ha podido actualizar el partido",false);
    
}