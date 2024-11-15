<?php
session_start();


//Si existe y no está vacío
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $idProducto = $_POST['id'];
    //Si exiuste la sesión carrito con un id, al pulsar eliminar se resta 1 a la cantidad
    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto]--;
        //si el valor es igual o menos a 0, entonces destruir la sesion carrito
        if ($_SESSION['carrito'][$idProducto] <= 0) {
            unset($_SESSION['carrito'][$idProducto]);
        }
    }
}
header("Location: ../Vista/Carritohtml.php");
exit();
?>
