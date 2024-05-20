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
    
}
?>