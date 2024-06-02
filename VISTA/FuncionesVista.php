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
                        <th scope="col"></th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Disponibilidad</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    ';
                    foreach($arrayArbitros as $arbitro){
                        $rend .='<tr>';
                        $rend.='<td>'.$arbitro->getId().'</td>';
                        $rend.='<td><div class="rounded-circle" style="width: 2cm; height:2cm; background-position:center; background-size:cover; background-image: url(\''.self::mostraRutaFotoArbitro($arbitro).'\')"></div></td>';
                        $rend.='<td>'.$arbitro->getNombre()." ".$arbitro->getApellidos().'</td>';
                        if($arbitro->getDisponibilidad()=="DISPONIBLE"){
                            $rend.='<td class="text-center text-white fw-bold bg-success">'.$arbitro->getDisponibilidad().'</td>';
                        }else{
                            $rend.='<td class="text-center text-white fw-bold bg-danger">'.$arbitro->getDisponibilidad().'</td>';
                        }
                        $rend.='<td><a class="btn btn-secondary" href="perfilArbitro.php?dni='.$arbitro->getDni().'">Editar</td></a>'; 
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

    public static function imprimirDatosArbitro($arbitro){
        $rend=  '<form action="../CONTROLADOR/actualizarPersona.php" method="GET">
                    <div class="row w-75">
                        <h1 class="text-center">Datos del Árbitro</h1>
                        <input type="text" name="id" class="form-control" value="'.$arbitro->getId().'" hidden>
                        <div class="col-12 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="'.$arbitro->getNombre().'" placeholder="'.$arbitro->getNombre().'">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="'.$arbitro->getApellidos().'" placeholder="'.$arbitro->getApellidos().'">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text" name="dni" class="form-control" value="'.$arbitro->getDni().'" placeholder="'.$arbitro->getDni().'">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Número de teléfono</label>
                            <input type="text" name="tel" class="form-control" value="'.$arbitro->getTelefono().'" placeholder="'.$arbitro->getTelefono().'">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="text" name="correo" class="form-control" value="'.$arbitro->getEmail().'" placeholder="'.$arbitro->getEmail().'">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Disponibilidad</label>
                            <input type="text" name="disponibilidad" class="form-control" value="'.$arbitro->getDisponibilidad().'" placeholder="'.$arbitro->getDisponibilidad().'">
                        </div>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>';
        return $rend;
    }

    public static function mostraFotoArbitro($arbitro){
        $rutaBase = "../fotosArbitros/{$arbitro->getDni()}-{$arbitro->getNombre()}{$arbitro->getApellidos()}";
        $rend = "";

        $extensiones = ['jpg', 'jpeg', 'png','gif'];
        foreach ($extensiones as $extension) {
            $rutaImagen = "{$rutaBase}.{$extension}";
            if (file_exists($rutaImagen)) {
                $rend = '<img style="width:10cm; height:10cm;" src="'.$rutaImagen.'" class="img-fluid rounded-circle border" id="fotoCarnet" alt="No hay foto">';
                return $rend; // Si la imagen se encuentra, la mostramos y salimos del bucle
            }
        }   
        if ($rend == "")
            return '<img id="fotoCarnet" style="width:10cm; height:10cm;" src="../fotosArbitros/no-image-available.jpeg" class="img-fluid rounded-circle border" id="fotoCarnet" alt="No hay foto">';
    }

    public static function mostraRutaFotoArbitro($arbitro){
        $ret = "../fotosArbitros/no-image-available.jpeg";
        $rutaBase = "../fotosArbitros/{$arbitro->getDni()}-{$arbitro->getNombre()}{$arbitro->getApellidos()}";
        $extensiones = ['jpg', 'jpeg', 'png','gif'];
        foreach ($extensiones as $extension) {
            $rutaImagen = "{$rutaBase}.{$extension}";
            if (file_exists($rutaImagen)) {
                $ret = $rutaImagen; // Si la imagen se encuentra, la mostramos y salimos del bucle
            }
        }
        return $ret;
    }


}
?>