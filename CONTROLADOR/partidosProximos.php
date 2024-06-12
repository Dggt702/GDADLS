
<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");

    $arrayPartidos = Funciones::obtenerPartidosFuturosPorDeporte($_POST["filtradoDeporte"]);    
    if(empty($arrayPartidos)){
        $html = "";
    }else{
        $html = FuncionesVista::imprimirCardsPartidosProximosPorFiltradoDeportes($arrayPartidos);
    }
    echo json_encode($html);
    