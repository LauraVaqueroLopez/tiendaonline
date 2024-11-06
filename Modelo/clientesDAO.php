<?php
require_once 'db.php';
require_once 'DTOclientes.php';

class EmpleadoDAO {
    private $conn;
    public function __construct() {
        $this->conn = DB::getConnection();
    }
    
    public function getEmpleadoById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM empleados WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new DTOEmpleado($fila['id'], $fila['nombre'], $fila['edad'], $fila['dpto_id'], $fila['imagen']);
        } else {
            return null; // Si no se encuentra, devolvemos null
        }
    }

    public function addEmpleado($empleado) {
        $stmt = $this->conn->prepare("INSERT INTO Cliente (nombre) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $empleado->getNombre());
        return $stmt->execute();
    }

    public function deleteEmpleado($id) {
        $stmt = $this->conn->prepare("DELETE FROM Cliente WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
