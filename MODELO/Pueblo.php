<?php
class Pueblo {
    private $id;
    private $nombre;
    private $codigo_postal;

    // Constructor
    public function __construct($id, $nombre, $codigo_postal) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigo_postal = $codigo_postal;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCodigoPostal() {
        return $this->codigo_postal;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCodigoPostal($codigo_postal) {
        $this->codigo_postal = $codigo_postal;
    }
}
?>