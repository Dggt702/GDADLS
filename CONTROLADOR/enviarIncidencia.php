<?php
require_once("../MODELO/Funciones.php");
require_once("../MODELO/Clases.php");

session_start();  

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $incidencia = new Incidencia("",$_POST["id"],$_POST["comentario"]);
    Funciones::enviarIncidencia($incidencia);
    header("Location: ../VISTA/vistaArbitro.php"); 
}
?>
