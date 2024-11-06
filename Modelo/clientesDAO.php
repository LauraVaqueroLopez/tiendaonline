<?php
require_once 'db.php';
require_once 'DTOclientes.php';

class EmpleadoDAO {
    private $conn;
    public function __construct() {
        $this->conn = DB::getConnection();
    }

    public function addEmpleado($cliente) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nombre) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $cliente->getNombre());
        return $stmt->execute();
    }
    
}
?>
