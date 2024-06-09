<?php
class Polideportivo {
    private $id;
    private $ubicacion;

    public function __construct($id, $ubicacion) {
        $this->id = $id;
        $this->ubicacion = $ubicacion;
    }

    public function getId() {
        return $this->id;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }
}
