<?php

require_once "../Modelo/ProductoDao.php";

session_start();

if (isset($_POST['id'])) {
    $idProducto = $_POST['id'];
    $productoDao = new ProductoDao();

    $productoDao->deleteProducto($idProducto);
    $_SESSION['aviso']= "Eliminado con éxito. Vuelva al inicio para verlo.";
    header("Location: ../Vista/deletehtml.php");
    exit();
}else{
    $_SESSION['aviso']= "No se ha podido aeliminar el producto. Id incorrecto";
}

?>
