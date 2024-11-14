<?php

require_once "../Modelo/DTOProducto.php";
require_once "../Modelo/ProductoDao.php";

session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $prod = new DTOProducto($id,$nombre,$descripcion,$precio);
    $prodDao = new ProductoDao();
    $prodDao->addProductos($prod);

    $_SESSION['aviso'] = 'Producto agregado.';

    header("Location: ../Vista/Inserthtml.php");
    exit();

}else{
    $_SESSION['aviso'] = 'Error añadiendo el producto.';
}
?>