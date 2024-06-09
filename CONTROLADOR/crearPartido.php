<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once("../MODELO/Funciones.php");
require_once("../MODELO/Clases.php");
require_once '../VISTA/FuncionesVista.php';

session_start();

if(isset($_SESSION["idAdmin"])){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $jornada = $_POST["jornada"];
        $temporada = $_POST["temporada"];
        $fecha = $_POST["fecha"];
        $estado = 'PENDIENTE';
        $deporte = $_POST["deporte"];
        $categoria = $_POST["categoria"];
        $arbitro = $_POST["arbitro"];
        $local = $_POST["clubLocal"];
        $visitante = $_POST["clubVisitante"];

        $partido = new Partido("",$jornada,$temporada,$fecha,$estado,$deporte,$categoria,$arbitro,$local,$visitante);
        if(Funciones::insertarPartido($partido)){
            echo FuncionesVista::pantallaDeOperacion("El partido ha sido insertado con éxito",true);
        }else{
            echo FuncionesVista::pantallaDeOperacion("Ha ocurrido un error, vuelva a intentarlo",false);;
        } 
    }
}