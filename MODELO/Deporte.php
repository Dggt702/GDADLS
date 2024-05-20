<?php

class Deporte {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    // Getter para $id
    public function getId() {
        return $this->id;
    }

    // Setter para $id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter para $nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para $nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}

?>