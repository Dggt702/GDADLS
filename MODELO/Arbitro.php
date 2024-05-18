<?php

require_once("Usuario.php");

class Arbitro extends Usuario{
    private $nombre;
    private $apellidos;
    private $dni;
    private $telefono;
    private $email;
    private $disponibilidad;

    // Constructor
    public function __construct($id, $nombre, $apellidos, $dni, $contrasena, $telefono, $email, $disponibilidad) {
        parent::__construct($id,$contrasena);
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->disponibilidad = $disponibilidad;
    }

    // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDisponibilidad() {
        return $this->disponibilidad;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }
}