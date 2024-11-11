<?php
require_once '../Modelo/ProductoDAO.php';

class ControlSelectID
{
    public function listarPorID()
    {
        // Comprobación de si 'id' se ha enviado correctamente
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            $id = $_POST['id'];
            // Crear una instancia del DAO para obtener el producto
            $productoDAO = new ProductoDao();
            $producto = $productoDAO->getProductoById($id);  // Obtener producto por ID

            return $producto;
        }

        return null;  // Si no se envió un id o es inválido, retorna null
    }
}
?>
