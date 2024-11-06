<?php
require_once 'DB.php';
require_once 'DTOclientes.php';

class ClienteDAO {
    private $conn;

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    public function getClienteById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila ? new DTOclientes($fila['id'], $fila['nombre']) : null;
    }

    public function getClienteByNombre($nombre) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila ? new DTOclientes($fila['id'], $fila['nombre']) : null;
    }

    public function addCliente($cliente) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nombre) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $cliente->getNombre());
        return $stmt->execute();
    }
}
?>
