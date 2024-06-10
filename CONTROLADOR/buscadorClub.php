
<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");

if(isset($_POST["filtradoDeporte"])){
    $arrayClubes = Funciones::obtenerClubesPorBusquedaPorDeporte($_POST["busquedaClub"],$_POST["filtradoDeporte"]);    
}else{
    $arrayClubes = Funciones::obtenerClubesPorBusquedaPorDeporte($_POST["busquedaClub"],"");    
}
    if(empty($arrayClubes)){
        $html = "<h1 class='text-center'>No hay clubes</h1>";
    }else{
        $html = FuncionesVista::imprimirTablaClubes($arrayClubes);
    }
    echo json_encode($html);
    
?>