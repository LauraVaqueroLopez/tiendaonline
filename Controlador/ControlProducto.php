<?php
require_once '../Modelo/ProductoDAO.php';

class ControlProducto
{
    public function listarProductos()
    {
        $productoDAO = new ProductoDAO();
        return $productoDAO->getAllProductos();
    }

    public function obtenerProductoCarritoPorId($id_producto) {
        $productoDAO = new ProductoDAO();
        return $productoDAO->carritoProductoPorId($id_producto);
    }

}


?>
