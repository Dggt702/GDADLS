<?php

class Usuario {
    protected $id;
    protected $contrasenia;

    // Constructor
    public function __construct($id, $contrasenia) {
        $this->id = $id;
        $this->contrasenia = $contrasenia;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }
}

?>