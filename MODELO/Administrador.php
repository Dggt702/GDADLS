<?php

class Administrador {
    private $id;
    private $nombreUsuario;
    private $contrasenia;

    // Constructor
    public function __construct($id, $nombreUsuario, $contrasenia) {
        $this->id = $id;
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasenia = $contrasenia;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }
}

?>