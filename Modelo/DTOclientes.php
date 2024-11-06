<?php

class DTOclientes {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }


    public function setNombre($nombre){
        $this->nombre = $nombre;
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id): void{
        $this->id = $id;
    }

}
?>
