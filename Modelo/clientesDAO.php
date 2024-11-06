<?php
require_once 'db.php';
require_once 'DTOclientes.php';

class EmpleadoDAO {
    private $conn;
    public function __construct() {
        $this->conn = DB::getConnection();
    }
    
    public function getClienteById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Cliente WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new DTOCliente($fila['id'], $fila['nombre']);
        } else {
            return null; // Si no se encuentra, devolvemos null
        }
    }

    public function addCliente($cliente) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nombre) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $cliente->getNombre());
        return $stmt->execute();
    }

    public function deleteCliente($id) {
        $stmt = $this->conn->prepare("DELETE FROM Cliente WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
