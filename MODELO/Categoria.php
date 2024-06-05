<?php
class Categoria {
    private $id;
    private $descripcion;

    // Constructor
    public function __construct($id, $descripcion) {
        $this->id = $id;
        $this->descripcion = $descripcion;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}