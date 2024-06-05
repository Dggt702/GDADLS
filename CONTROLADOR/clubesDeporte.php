<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");

session_start();


if(isset($_POST["deporte"])){
    $idDeporte = $_POST["deporte"];

    if($idDeporte > 0){
        $arrayClubes = Funciones::obtenerClubesDeporte($idDeporte);
        
        if(empty($arrayClubes)){
            $html = "<h1 class='text-center'>No hay Clubes para este Deporte</h1>";
        }else{
            $html = "<label class='form-label'>Clubes</label>";
            $html .= FuncionesVista::imprimirSelectClubesDeporte($idDeporte,"club","club");
        }
                    
        echo json_encode($html);
    }
    
}