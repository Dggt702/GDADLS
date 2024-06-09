<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");
require_once("../MODELO/Clases.php");

if($_SERVER["REQUEST_METHOD"] === "GET"){

    $id = $_GET["id"];
    $nombre = $_GET["nombre"];
    $apellidos = $_GET["apellidos"];
    $telefono = $_GET["tel"];
    $correo = $_GET["correo"];
    $disponibilidad = $_GET["disponibilidad"];
    
    $arbitro = new Arbitro($id,$nombre,$apellidos,'','',$telefono,$correo,$disponibilidad);
    
    if(Funciones::editarArbitro($arbitro)){
        echo FuncionesVista::pantallaDeOperacion("Se ha actualizado la persona correctamente",true);
    }else header("Location: ../VISTA/perfilArbitro.php?dni=".$dni."&error=true");
    
}