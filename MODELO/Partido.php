<?php

class Partido {
    private $id;
    private $jornada;
    private $temporada;
    private $fecha;
    private $estado;
    private $deporte;
    private $categoria;
    private $arbitro;
    private $local;
    private $visitante;

    public function __construct($id, $jornada, $temporada, $fecha, $estado, $deporte, $categoria, $arbitro, $local, $visitante) {
        $this->id = $id;
        $this->jornada = $jornada;
        $this->temporada = $temporada;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->deporte = $deporte;
        $this->categoria = $categoria;
        $this->arbitro = $arbitro;
        $this->local = $local;
        $this->visitante = $visitante;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getJornada() {
        return $this->jornada;
    }

    public function getTemporada() {
        return $this->temporada;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getDeporte() {
        return $this->deporte;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getArbitro() {
        return $this->arbitro;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getVisitante() {
        return $this->visitante;
    }
}
