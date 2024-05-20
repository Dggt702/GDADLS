<?php

class Club {
    private $id;
    private $nombre;
    private $localizacion;
    private $deporte;
    private $persona_contacto;
    private $telefono_contacto;
    private $correo_contacto;

    // Constructor
    public function __construct($id, $nombre, $localizacion, $deporte, $persona_contacto, $telefono_contacto, $correo_contacto) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->localizacion = $localizacion;
        $this->deporte = $deporte;
        $this->persona_contacto = $persona_contacto;
        $this->telefono_contacto = $telefono_contacto;
        $this->correo_contacto = $correo_contacto;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getLocalizacion() {
        return $this->localizacion;
    }

    public function getDeporte() {
        return $this->deporte;
    }

    public function getPersonaContacto() {
        return $this->persona_contacto;
    }

    public function getTelefonoContacto() {
        return $this->telefono_contacto;
    }

    public function getCorreoContacto() {
        return $this->correo_contacto;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setLocalizacion($localizacion) {
        $this->localizacion = $localizacion;
    }

    public function setDeporte($deporte) {
        $this->deporte = $deporte;
    }

    public function setPersonaContacto($persona_contacto) {
        $this->persona_contacto = $persona_contacto;
    }

    public function setTelefonoContacto($telefono_contacto) {
        $this->telefono_contacto = $telefono_contacto;
    }

    public function setCorreoContacto($correo_contacto) {
        $this->correo_contacto = $correo_contacto;
    }
}
?>