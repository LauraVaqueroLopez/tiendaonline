<?php
require_once 'db.php';
require_once 'DTOProductos.php';
class ProductoDao
{
private $conn;

public function __construct(){
$this->conn= DB::getConnection();
        }

    public function getProductosById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new DTOProductos($fila['id'], $fila['nombre']);
        } else {
            return null;
        }
    }


    public function getAllProductos() {
        $stmt = $this->conn->prepare("SELECT * FROM productos");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productos = [];
        foreach ($resultados as $fila) {
            $producto = new DTOProductos($fila['id'], $fila['nombre']);
            $productos[] = $producto;
        }
        return $productos;
    }

    public function addProductos($producto) {
        $stmt = $this->conn->prepare("INSERT INTO producto (id, nombre) VALUES (:id, :nombre)");
        $stmt->bindParam(':id', $producto->getId());
        $stmt->bindParam(':nombre', $producto->getNombre());
        return $stmt->execute();
    }

    public function updateproducto($producto) {
        $stmt = $this->conn->prepare("UPDATE productos SET nombre = :nombre = WHERE id = :id");
        $stmt->bindParam(':id', $producto->getId());
        $stmt->bindParam(':nombre', $producto->getNombre());
        return $stmt->execute();
    }

    public function deleteproducto($id) {
        $stmt = $this->conn->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}