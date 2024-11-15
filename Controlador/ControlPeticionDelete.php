<?php

require_once "../Modelo/DTOProductos.php";
require_once "../Modelo/ProductoDao.php";

session_start();

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $idProducto = $_POST['id'];
    $productoDao = new ProductoDao();

    $productoDao->deleteProducto($idProducto);
}
header("Location: ../Vista/menuhtml.php");
exit();

?>
