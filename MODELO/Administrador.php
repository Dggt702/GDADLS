<?php

class Administrador extends Usuario{
    
    private $nombreUsuario;
    

    // Constructor
    public function __construct($id, $nombreUsuario, $contrasenia) {
        parent::__construct($id,$contrasenia);
        $this->nombreUsuario = $nombreUsuario;
    }

    // Getters
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    // Setters
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    
}

?>