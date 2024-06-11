<?php
require_once("../MODELO/Clases.php");
require_once("../MODELO/Funciones.php");
class FuncionesVista{

    public static function pantallaDeOperacion($mensaje,$bool){
        $rend = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <title>Confirmación</title>
        </head>
        <body class="position-absolute top-50 start-50 translate-middle">
        ';
        if($bool){
            $rend .= "<div class='row border border-dark rounded border-opacity-10 shadow' style='padding:2cm;'>";
            $rend .="<div><h1 class='text-center'>Operación Realizada Con Éxito</h1></div>";
            $rend .="<div><p class='fw-light text-center'>".$mensaje."</p></div>";
            $rend.='<div class="text-center"><a class="btn btn-success" href="javascript: history.go(-1)">Volver atrás</a></div>';
            $rend .= "</div></body>";
            return $rend;
        }else{
            $rend .= "<div class='row border border-dark rounded border-opacity-10 shadow bg-danger' style='padding:2cm;'>";
            $rend .="<div ><h1 class='text-center'>Ha ocurrido un error :(</h1></div>";
            $rend .="<div class='text-light'><p class='fw-light text-center'>".$mensaje."</p></div>";
            $rend.='<div class="text-center"><a class="btn btn-dark " href="javascript: history.go(-1)">Volver atrás</a></div>';
            $rend .= "</div></body>";
            return $rend;
        }   
    }

    public static function imprimirSelectDeportes($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige un deporte</option>";
        $arrayDeportes= Funciones::obtenerDeportes();
            
        foreach($arrayDeportes as $deporte){
            $rend.="<option value='".$deporte->getId()."'>".$deporte->getNombre()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirSelectLocalizaciones($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige una Localización</option>";
        $arrayPueblos= Funciones::obtenerPueblos();
            
        foreach($arrayPueblos as $pueblo){
            $rend.="<option value='".$pueblo->getId()."'>".$pueblo->getNombre()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirSelectCategorias($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige una Categoría</option>";
        $arrayCategoria= Funciones::obtenerCateorias();
            
        foreach($arrayCategoria as $categoria){
            $rend.="<option value='".$categoria->getId()."'>".$categoria->getDescripcion()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }
    public static function imprimirSelectArbitrosDisponibles($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige el Árbitro</option>";
        $arrayArbitros= Funciones::obtenerArbitrosDisponibles();
            
        foreach($arrayArbitros as $arbitros){
            $rend.="<option value='".$arbitros->getId()."'>".$arbitros->getNombre().' '. $arbitros->getApellidos()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirSelectArbitros($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige el Árbitro</option>";
        $arrayArbitros= Funciones::obtenerArbitros();
            
        foreach($arrayArbitros as $arbitros){
            $rend.="<option value='".$arbitros->getId()."'>".$arbitros->getNombre().' '. $arbitros->getApellidos()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirSelectClubesDeporte($idDeporte,$id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige Equipo</option>";
        $arrayClubes= Funciones::obtenerClubesDeporte($idDeporte);
            
        foreach($arrayClubes as $club){
            $pueblo = Funciones::obtenerPueblo($club->getLocalizacion());
            $rend.="<option value='".$club->getId()."'>".$club->getNombre().' '. $pueblo->getNombre()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirSelectPolideportivos($id,$nombre){
        $rend = "<select class='form-select' name='".$nombre."' id='".$id."' required>";
        $rend.= "<option value='' disabled hidden selected>Elige la sede del Club</option>";
        $arrayPolideportivos = Funciones::obtenerPolideportivos();
            
        foreach($arrayPolideportivos as $poli){
            $rend.="<option value='".$poli->getId()."'>".$poli->getUbicacion()."</option>";
        }
        $rend.="</select>";
        return $rend;
    }

    public static function imprimirTablaArbitros($arrayArbitros){

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

    public static function imprimirTablaClubes($arrayClubes){

        if(empty($arrayClubes)){
            $rend = "<h1 class='text-center'>No hay clubes registrados</h1>";
        }else{
            $rend='<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Deporte</th>
                        <th scope="col">Contacto</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    ';
                    foreach($arrayClubes as $club){
                        $deporte = Funciones::obtenerDeporte($club->getDeporte());
                        $pueblo = Funciones::obtenerPueblo($club->getLocalizacion());
                        $polideportivo = Funciones::obtenerPolideportivo($club->getPolideportivo());

                        $rend .='<tr>';
                        $rend.='<td>'.$club->getNombre().'</td>';
                        $rend.='<td>'.$polideportivo->getUbicacion().' - '.$pueblo->getNombre().'</td>';
                        $rend.='<td>'.$deporte->getNombre().'</td>';
                        $rend.='<td>'.$club->getPersonaContacto().' '.$club->getTelefonoContacto().' '.$club->getCorreoContacto().'</td>';
                        $rend.='<td><a class="btn btn-secondary" href="perfilClub.php?id='.$club->getId().'">Editar</td></a>'; 
                        $rend.='</tr>';
                    }
                    $rend .='
                </tbody>
            </table>';
        }
        return $rend;
    }

    public static function imprimirTablaPartidos($arrayPartidos){

        if(empty($arrayPartidos)){
            $rend = "<h1 class='text-center'>No hay partidos registrados</h1>";
        }else{
            $rend='<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Jornada</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Deporte</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Arbitro</th>
                        <th scope="col">Equipo local</th>
                        <th scope="col">Equipo Visitante</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    ';
                    foreach($arrayPartidos as $partido){
                        $deporte = Funciones::obtenerDeporte($partido->getDeporte());
                        $categoria = Funciones::obtenerCategoria($partido->getCategoria());
                        $arbitro = Funciones::obtenerArbitro($partido->getArbitro());
                        $equipoLocal = Funciones::obtenerClub($partido->getLocal());
                        $equipoVisitante = Funciones::obtenerClub($partido->getVisitante());

                        $rend .='<tr>';
                        $rend.='<td>'.$partido->getJornada().'-'.$partido->getTemporada().'</td>';
                        $rend.='<td>'.$partido->getfecha().'</td>';
                        $rend.='<td>'.$deporte->getNombre().'</td>';
                        $rend.='<td>'.$categoria->getDescripcion().'</td>';
                        $rend.='<td>'.$arbitro->getNombre().' '.$arbitro->getApellidos().'</td>';
                        $rend.='<td>'.$equipoLocal->getNombre().'</td>';
                        $rend.='<td>'.$equipoVisitante->getNombre().'</td>';
                        if($partido->getEstado() == 'PENDIENTE'){
                            $rend.='<td class="text-center text-white fw-bold bg-primary p-3">'.$partido->getEstado().'</td>';
                        }
                            
                        $rend.='<td><a class="btn btn-secondary" href="perfilPartido.php?id='.$partido->getId().'">Editar</td></a>'; 
                        $rend.='</tr>';
                    }
                    $rend .='
                </tbody>
            </table>';
        }
        return $rend;
    }

    public static function imprimirIncidencias($arrayIncidencias){
        $rend = "";
        if(!empty($arrayIncidencias)){
            foreach($arrayIncidencias as $incidencia){
                $rend .= '
                <div class="col-6 px-2">
                    <div class="card mb-3">
                        <div class="card-header">Incidencia</div>
                        <div class="card-body">
                            <h5 class="card-title">Incidencia N° '.$incidencia->getId().'</h5>
                            <p class="card-text">Jornada '.$incidencia->getComentario().'</p>
                        </div>
                    </div>
                </div>';
            }
        }else{
            $rend .= "<h2>No hay incidencias</h2>";
        }
        return $rend;
    }

    public static function imprimirCardsPartido($idArbitro){
        $arbitro = Funciones::obtenerArbitro($idArbitro);
        $arrayPartidos = Funciones::obtenerPartidosFuturosArbitro($idArbitro);
        $rend = '';

        if(!empty($arrayPartidos)){
            foreach($arrayPartidos as $partido){
                $deporte = Funciones::obtenerDeporte($partido->getDeporte());
                $local = Funciones::obtenerClub($partido->getLocal());
                $visitante = Funciones::obtenerClub($partido->getVisitante());
                $polideportivo = Funciones::obtenerPolideportivo($local->getPolideportivo());
                $pueblo = Funciones::obtenerPueblo($local->getLocalizacion());

                $rend .= '
                <div class="col-md-6 col-sm-12 px-2">
                    <div class="card mb-3">
                        <div class="card-header">'.$deporte->getNombre().'</div>
                        <div class="card-body">
                            <h5 class="card-title">'.$local->getNombre().' vs '.$visitante->getNombre().'</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">'.$partido->getFecha().'</h6>
                            <p class="card-text">Jornada '.$partido->getJornada().' - Temporada '.$partido->getTemporada().'</p>
                            <p class="card-text">'.$polideportivo->getUbicacion().' - '.$pueblo->getNombre().'</p>
                            <a href="https://www.google.com/maps/search/?api=1&query='.$polideportivo->getUbicacion().'" class="btn btn-primary id="redirectButton"">Ubicación</a>
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Incidencia</button>
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Incidencia</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    
                                        <form action="../CONTROLADOR/enviarIncidencia.php" method="POST">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Partido</label>
                                                    <input type="text" class="form-control fw-bold" name="idPartido" value="'.$partido->getId().'" hidden>
                                                    <input type="text" class="form-control fw-bold" value="'.$local->getNombre().' vs '.$visitante->getNombre().'" readonly>
                                                    <label class="form-label">Árbitro</label>
                                                    <input type="text" class="form-control fw-bold" name="idArbitro" value="'.$idArbitro.'" hidden>
                                                    <input type="text" class="form-control fw-bold" value="'.$arbitro->getNombre()." ".$arbitro->getApellidos().'" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Comentario</label>
                                                    <textarea name="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Enviar Incidencia</button>
                                            </div>                                      
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        }else $rend .= '<p>No hay partidos</p>';
        return $rend;
    }


    public static function mostraFotoArbitro($arbitro){

        $nombreArchivo = ($arbitro->getDni().'-'.$arbitro->getNombre().$arbitro->getApellidos());
        $rutaBase = "../fotosArbitros/".$nombreArchivo."";
        $rend = "";
        $extensiones = ['jpg', 'jpeg', 'png'];
        foreach ($extensiones as $extension) {
            $rutaImagen = "{$rutaBase}.{$extension}";
            if (file_exists($rutaImagen)) {
                $rend = '<img src="'.$rutaImagen.'" class="img-fluid border" id="fotoCarnet" alt="No hay foto">';
            }
        }
        if($rend == "") $rend = '<img id="fotoCarnet" src="../fotosArbitros/no-image-available.jpeg" class="img-fluid rounded-circle border" id="fotoCarnet" alt="No hay foto">';
        return $rend;
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