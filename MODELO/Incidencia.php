<?php


class Incidencia{

    private $id;
    private $id_partido;
    private $comentario;

    public function __construct($id, $id_partido,$comentario) {
        $this->id = $id;
        $this->id_partido = $id_partido;
        $this->comentario = $comentario;
    }

    // Getter para $id
    public function getId() {
        return $this->id;
    }

    // Setter para $id
    public function setId($id) {
        $this->id = $id;
    }

     // Getter para $idArbitro
     public function getIdPartido() {
        return $this->id_partido;
    }

    // Setter para $idArbitro
    public function setIdPartido($id_partido) {
        $this->id_partido = $id_partido;
    }

     // Getter para $idComentario
     public function getComentario() {
        return $this->comentario;
    }

    // Setter para $idComentario
    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

}


?>