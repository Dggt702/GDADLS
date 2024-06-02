<?php
require_once("../MODELO/Clases.php");
require_once("../MODELO/Funciones.php");
class FuncionesVista{

    public static function imprimirSelectDeportes($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."'>";
        $rend.= "<option disabled hidden selected>Elige un deporte</option>";
        $rend.= "<option>Ninguna</option>";
        $arrayDeportes= Funciones::obtenerDeportes();
            
        foreach($arrayDeportes as $deporte){
            $rend.="<option value='".$deporte->getId()."'>".$deporte->getNombre()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirSelectLocalizaciones($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."'>";
        $rend.= "<option disabled hidden selected>Elige una Localización</option>";
        $rend.= "<option>Ninguna</option>";
        $arrayPueblos= Funciones::obtenerPueblos();
            
        foreach($arrayPueblos as $pueblo){
            $rend.="<option value='".$pueblo->getId()."'>".$pueblo->getNombre()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirTablaArbitros(){
        $arrayArbitros = Funciones::obtenerArbitros();

        if(empty($arrayArbitros)){
            $rend = "<h1 class='text-center'>No hay arbitros registrados</h1>";
        }else{
            $rend='<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Disponibilidad</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    ';
                    foreach($arrayArbitros as $arbitro){
                        $rend .='<tr>';
                        $rend.='<td>'.$arbitro->getId().'</td>';
                        $rend.='<td>'.$arbitro->getNombre()." ".$arbitro->getApellidos().'</td>';
                        if($arbitro->getDisponibilidad()=="DISPONIBLE"){
                            $rend.='<td class="text-center text-white fw-bold bg-success">'.$arbitro->getDisponibilidad().'</td>';
                        }else{
                            $rend.='<td class="text-center text-white fw-bold bg-danger">'.$arbitro->getDisponibilidad().'</td>';
                        }
                        $rend.='<td><a class="btn btn-secondary" href="perfilArbitro.php?id='.$arbitro->getId().'">Editar</td></a>'; 
                        $rend.='</tr>';
                    }
                    $rend .='
                </tbody>
            </table>';
        }
        return $rend;
    }

    public static function imprimirTablaClubes(){
        $arrayClubes = Funciones::obtenerClubes();

        if(empty($arrayClubes)){
            $rend = "<h1 class='text-center'>No hay clubes registrados</h1>";
        }else{
            $rend='<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Deporte</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    ';
                    foreach($arrayClubes as $club){
                        $rend .='<tr>';
                        $rend.='<td>'.$club->getId().'</td>';
                        $rend.='<td>'.$club->getNombre().'</td>';
                        $rend.='<td>'.$club->getDeporte().'</td>';
                        $rend.='<td><a class="btn btn-secondary" href="perfilClub.php?id='.$club->getId().'">Editar</td></a>'; 
                        $rend.='</tr>';
                    }
                    $rend .='
                </tbody>
            </table>';
        }
        return $rend;
    }

    public static function imprimirTablaPartidos(){
        $arrayPartidos = Funciones::obtenerPartidos();

        if(empty($arrayPartidos)){
            $rend = "<h1 class='text-center'>No hay clubes registrados</h1>";
        }else{
            $rend='<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Deporte</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    ';
                    foreach($arrayPartidos as $club){
                        $rend .='<tr>';
                        $rend.='<td>'.$club->getId().'</td>';
                        $rend.='<td>'.$club->getNombre().'</td>';
                        $rend.='<td>'.$club->getDeporte().'</td>';
                        $rend.='<td><a class="btn btn-secondary" href="perfilClub.php?id='.$club->getId().'">Editar</td></a>'; 
                        $rend.='</tr>';
                    }
                    $rend .='
                </tbody>
            </table>';
        }
        return $rend;
    }
    
}
?>