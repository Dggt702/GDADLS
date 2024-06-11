
<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");


$arrayIncidencias = Funciones::obtenerIncidenciaPorArbitros($_POST["filtradoArbitro"]);    
$html = FuncionesVista::imprimirIncidencias($arrayIncidencias);    
echo json_encode($html);
    
    
?>