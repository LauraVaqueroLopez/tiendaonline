<?php
require_once 'db.php';
require_once 'DTOclientes.php';

class EmpleadoDAO {
    private $conn;
    public function __construct() {
        $this->conn = DB::getConnection();
    }

    public function addEmpleado($empleado) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nombre) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $empleado->getNombre());
        return $stmt->execute();
    }
    
}
?>
