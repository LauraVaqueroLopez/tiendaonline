<?php
require_once 'DB.php';

class clientesDAO {
    private $conn;

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    // Método para obtener un usuario por nombre
    public function getClienteByNombre($nombre) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
