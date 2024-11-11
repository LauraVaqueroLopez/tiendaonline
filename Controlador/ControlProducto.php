<?php
require_once '../Modelo/ProductoDAO.php';

class ControlProducto {
    public function listarProductos() {
        $productoDAO = new ProductoDAO();
        return $productoDAO->getAllProductos();
    }
}
?>
