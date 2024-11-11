<?php
require_once 'DB.php';
require_once 'DTOclientes.php';

class ClientesDAO {
    private $conn;

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    // Método para registrar un cliente
    public function addCliente($nombre, $contraseña) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nickname, password) VALUES (:nombre, :password)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':password', $contraseña);
        return $stmt->execute();
    }

    // Método para verificar si un cliente ya está registrado
    public function getClienteByNombre($nombre) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE nickname = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>
