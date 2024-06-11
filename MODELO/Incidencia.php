<?php


class Incidencia{

    private $id;
    private $id_arbitro;
    private $comentario;

    public function __construct($id, $id_arbitro,$comentario) {
        $this->id = $id;
        $this->id_arbitro = $id_arbitro;
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
     public function getIdArbitro() {
        return $this->id_arbitro;
    }

    // Setter para $idArbitro
    public function setIdArbitro($id_arbitro) {
        $this->id_arbitro = $id_arbitro;
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