<?php

require_once "../Modelo/ProductoDao.php";

session_start();

if (isset($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio']) &&
    !empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio'])) {

    $idProducto = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $productoDao = new ProductoDao();
    $producto = new DTOProducto($idProducto, $nombre, $descripcion, $precio);
    $productoDao->updateProducto($producto);

    $_SESSION['aviso']= "Producto actualizado con éxito. Vuelva al inicio para verlo.";
    header("Location: ../Vista/Uploadhtml.php");
    exit();
    }else{
    $_SESSION['aviso']= "No se ha podido actualizar el producto";

}

if (!isset($_POST['id'])){

    $_SESSION['aviso']= "Id incorrecto";

}

?>
