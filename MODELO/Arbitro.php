<?php

class Arbitro {
    private $id;
    private $nombre;
    private $apellidos;
    private $dni;
    private $contrasena;
    private $email;
    private $disponibilidad;

    // Constructor
    public function __construct($id, $nombre, $apellidos, $dni, $contrasena, $email, $disponibilidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->disponibilidad = $disponibilidad;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDisponibilidad() {
        return $this->disponibilidad;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }
}

?>