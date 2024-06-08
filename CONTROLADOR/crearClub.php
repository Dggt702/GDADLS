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

        $nombre = $_POST["nombre"];
        $localizacion = $_POST["localizacion"];
        $deporte = $_POST["deporte"];
        $personaContacto = $_POST["personaContacto"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        $club = new Club("",$nombre,$localizacion,$deporte,$personaContacto,$telefono,$correo);
        if(Funciones::insertarClub($club)){
            echo FuncionesVista::pantallaDeOperacion("El club ha sido insertado con éxito",true);
        }else{
            echo FuncionesVista::pantallaDeOperacion("Ha ocurrido un error, vuelva a intentarlo",false);;
        } 
    }
}