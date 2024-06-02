<?php
require_once("../MODELO/Funciones.php");
require_once("../VISTA/FuncionesVista.php");
require_once("../MODELO/Clases.php");


if(isset($_GET)){
    $arbitro = new Arbitro("",$_GET["nombre"],$_GET["apellidos"],$_GET["dni"],"",$_GET["tel"],$_GET["correo"],$_GET["disponibilidad"]);
    
    if(Funciones::editarArbitro($arbitro)){
        echo FuncionesVista::pantallaDeOperacion("Se ha actualizado la persona correctamente",true);
    }else header("Location: ../VISTA/perfilArbitro.php?dni=".$dni."&error=true");
}
