<?php
session_start();

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $idProducto = $_POST['id'];

    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto]--;

        if ($_SESSION['carrito'][$idProducto] <= 0) {
            unset($_SESSION['carrito'][$idProducto]);
        }
    }
}
header("Location: ../Vista/Carritohtml.php");
exit();
?>
