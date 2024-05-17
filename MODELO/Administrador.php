<?php

class Administrador {
    private $id;
    private $nombreUsuario;
    private $contrasenia;

    // Constructor
    public function __construct($id, $nombreUsuario, $contrasenia) {
        parent::__construct($id,$contrasena);
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