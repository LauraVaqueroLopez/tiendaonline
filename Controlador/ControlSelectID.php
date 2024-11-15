<?php
session_start();
require_once '../Modelo/ProductoDAO.php';

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $productoDAO = new ProductoDAO();
    $producto = $productoDAO->getProductoById($id);

    if ($producto) {
        $_SESSION['producto'] = [
            'id' => $producto->getId(),
            'nombre' => $producto->getNombre(),
            'descripcion' => $producto->getDescripcion(),
            'precio' => $producto->getPrecio()
        ];
        unset($_SESSION['aviso']);
    } else {
        $_SESSION['aviso'] = 'Producto no encontrado';
        unset($_SESSION['producto']);
    }

    header("Location: ../Vista/Mostrarhtml.php");
    exit();
} else {
    $_SESSION['aviso'] = 'ID no proporcionado';
    header("Location: ../Vista/Mostrarhtml.php");
    exit();
}
?>