<?php

require_once "../Modelo/DTOProductos.php";
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
    //agregarProductoATienda($id, $nombre, $descripcion, $precio);
    //print "Producto añadido correctamente.";
   // print_r($_SESSION['productos']);
    header("Location: ../Vista/menuhtml.php");
    exit();

    //header("Location: ../Vista/menuhtml.php");
}
?>
