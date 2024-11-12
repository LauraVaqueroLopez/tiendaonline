<?php
require_once 'db.php';
require_once 'DTOProducto.php';

class ProductoDao
{
    private $conn;

    public function __construct(){
        $this->conn = DB::getConnection();
    }

    public function getAllProductos() {
        $stmt = $this->conn->prepare("SELECT * FROM Producto");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productos = [];
        foreach ($resultados as $datosProducto) {
            $producto = new DTOProducto($datosProducto['id'], $datosProducto['nombre'], $datosProducto['descripcion'], $datosProducto['precio']);
            $productos[] = $producto;
        }
        return $productos;
    }

    public function getProductoById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Producto WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $datosProducto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($datosProducto) {
            return new DTOProducto($datosProducto['id'], $datosProducto['nombre'], $datosProducto['descripcion'], $datosProducto['precio']);
        } else {
            return null;  // Si no se encuentra el producto, retorna null
        }
    }

    public function carritoProductoPorId($id_producto) {
        $query = "SELECT * FROM Producto WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_producto]);
        $datoProducto = $stmt->fetch();

        if ($datoProducto) {
            return new DTOProducto($datoProducto['id'], $datoProducto['nombre'], $datoProducto['descripcion'], $datoProducto['precio']);
        } else {
            return null;
        }
    }

    public function addProductos($producto) {
        $stmt = $this->conn->prepare("INSERT INTO Producto (id, nombre, descripcion, precio) VALUES (:id, :nombre, :descripcion, :precio)");
        $stmt->bindParam(':id', $producto->getId());
        $stmt->bindParam(':nombre', $producto->getNombre());
        $stmt->bindParam(':descripcion', $producto->getDescripcion());
        $stmt->bindParam(':precio', $producto->getPrecio());
        return $stmt->execute();
    }

    public function updateProducto($producto) {
        $stmt = $this->conn->prepare("UPDATE Producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id");
        $stmt->bindParam(':id', $producto->getId());
        $stmt->bindParam(':nombre', $producto->getNombre());
        $stmt->bindParam(':descripcion', $producto->getDescripcion());
        $stmt->bindParam(':precio', $producto->getPrecio());
        return $stmt->execute();
    }

    public function deleteProducto($id) {
        $stmt = $this->conn->prepare("DELETE FROM Producto WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
