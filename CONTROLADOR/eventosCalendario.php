<?php
require_once '../MODELO/Funciones.php';
header('Content-Type: application/json');

if(isset($_GET['idArbitro'])){
    $idArbitro = $_GET['idArbitro'];

    $arrayPartidos = Funciones::obtenerPartidosArbitro($idArbitro);

    if(empty($arrayPartidos)){
        $partido = '';
    }else{
        foreach($arrayPartidos as $partido){
            $local = Funciones::obtenerClub($partido->getLocal());
            $events[] = [
                'title' => $local->getNombre(),
                'start' => $partido->getFecha(),
            ];   
        }
    }

    echo json_encode($events);
}else header('Location: ../index.php');
    