<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");

session_start();


if(isset($_POST["deporte"])){
    $idDeporte = $_POST["deporte"];

    if(isset($_POST['local'])){
        $arrayClubes = Funciones::obtenerClubesDeporte($idDeporte);
        
        if(empty($arrayClubes)){
            $html = "<h1 class='text-center'>No hay Clubes para este Deporte</h1>";
        }else{
            $html = "<label class='form-label'>Equipo Local</label>";
            $html .= FuncionesVista::imprimirSelectClubesDeporte($idDeporte,"clubLocal","clubLocal");
        }
        echo json_encode($html);

    }if(isset($_POST['visitante'])){
        $arrayClubes = Funciones::obtenerClubesDeporte($idDeporte);
        
        if(empty($arrayClubes)){
            $html = "<h1 class='text-center'>No hay Clubes para este Deporte</h1>";
        }else{
            $html = "<label class='form-label'>Equipo Visitante</label>";
            $html .= FuncionesVista::imprimirSelectClubesDeporte($idDeporte,"clubVisitante","clubVisitante");
        }
        echo json_encode($html);
    }
    
}