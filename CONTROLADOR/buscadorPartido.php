
<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");

    $arrayPartidos = Funciones::obtenerPartidosPorDeporte($_POST["filtradoDeporte"]);    
    if(empty($arrayPartidos)){
        $html = "<h1 class='text-center'>No hay partidos</h1>";
    }else{
        $html = FuncionesVista::imprimirTablaPartidos($arrayPartidos);
    }
    echo json_encode($html);
    
?>