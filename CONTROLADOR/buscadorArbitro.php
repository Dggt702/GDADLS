
<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");

    $arrayPersonas = Funciones::obtenerArbitrosPorBusqueda($_POST["busquedaArbitro"]);    
    if(empty($arrayPersonas)){
        $html = "<h1 class='text-center'>No hay personas</h1>";
    }else{
        $html = FuncionesVista::imprimirTablaArbitros($arrayPersonas);
    }
    echo json_encode($html);
    
?>