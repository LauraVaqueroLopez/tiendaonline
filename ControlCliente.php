<?php

class ControlCliente
{
public function __construct(){
$this->clienteDAO = new ClienteDAO();
}

public function crearCliente($cliente){
if ($cliente->getEdad() > 18){
    $this->ClienteDAo->addCliente($cliente);
    return true;
} else {
    return false;
        }
    }
}
?>