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
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nombre, password) VALUES (:nombre, :contraseña)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':contraseña', $contraseña);
        return $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }

    // Método para verificar si un cliente ya está registrado
    public function getClienteByNombre($nombre) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
