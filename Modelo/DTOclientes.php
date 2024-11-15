<?php

class DTOclientes {
    private $id;
    private $nombre;
    private $password;

    public function __construct($id, $nombre, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password; // Contraseña hash en este caso
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

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
?>

