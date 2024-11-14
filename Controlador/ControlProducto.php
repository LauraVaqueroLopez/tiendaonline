<?php
require_once '../Modelo/ProductoDAO.php';

class ControlProducto
{
    public function listarProductos()
    {
        $productoDAO = new ProductoDAO();
        return $productoDAO->getAllProductos();
    }

    public function obtenerProductoPorId($id_producto) {
        $productoDAO = new ProductoDAO();
        return $productoDAO->carritoProductoPorId($id_producto);
    }

    public function insertarProducto($id, $nombre, $descripcion, $precio)
    {
        // Validación de datos
        if (empty($id) || empty($nombre) || empty($descripcion) || empty($precio)) {
            $_SESSION['aviso'] = 'Rellena todo.';;
        }
        unset($_SESSION['aviso']);

        // Crear un objeto DTOProducto con los datos recibidos
        $producto = new DTOProducto($id, $nombre, $descripcion, $precio);

        // Instanciar ProductoDAO y agregar el producto a la base de datos
        $productoDAO = new ProductoDAO();
        return $productoDAO->addProductos($producto);
    }

}


?>
