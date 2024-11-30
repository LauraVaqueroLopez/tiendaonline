<?php

session_start();
require_once '../controlador/ControlProducto.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: loginhtml.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete - Tienda My Tech</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<header>
    <h1>My Techno</h1>
</header>

<nav>
    <ul class="table">
        <li><a href="menuhtml.php">Inicio</a></li>
        <li><a href="Mostrarhtml.php">Mostrar productos con id</a> </li>
        <li><a href="Inserthtml.php">Inserta productos</a></li>
        <li><a href="Deletehtml.php">Elimina productos</a></li>
        <li><a href="Uploadhtml.php">Actualiza productos</a></li>
        <li> <a href=""> Usuario: <?php print $_SESSION["usuario"]?></a></li>
        <li> <a href="../Controlador/ControlCerrarSesion.php">Cerrar sesión</a></li>
        <li>
            <a href="Carritohtml.php">
                <img src="https://static.vecteezy.com/system/resources/previews/016/314/413/non_2x/shopping-cart-free-png.png" alt="Carrito" style="width: 30px; height: 30px;">
            </a>
        </li>
    </ul>
</nav>

<main>

    <aside id="site-map">
        <h3>Mapa del Sitio</h3>
        <ul>
            <li><a href="menuhtml.php">Inicio</a></li>
            <ul>

                <li><a href="Mostrarhtml.php">Mostrar productos con id</a></li>
                <li><a href="Inserthtml.php">Inserta productos</a></li>
                <li><a href="Deletehtml.php">Elimina productos</a></li>
                <li><a href="Uploadhtml.php">Actualiza productos</a></li>
            </ul>
        </ul>
    </aside>


    <section>
        <h2>Escribe el id del producto</h2>
        <form action="../Controlador/ControlDeleteProductos.php" method="post">
            <label>ID del producto:</label><br>
            <input type="number" name="id"><br><br>
            <input type="submit" value="Eliminar Producto">
        </form><br>

        <?php
        if (isset($_SESSION['aviso'])) {
            echo '<span class="aviso">' . htmlspecialchars($_SESSION['aviso']) . '</span>';
            unset($_SESSION['aviso']);
        }
        ?>

    </section>

</main>

<footer>
    <p>Todos los derechos reservados.</p>
    <nav class="site-map">
        <a href="menuhtml.php">Inicio</a>
        <a href="Mostrarhtml.php">Mostrar productos</a>
        <a href="Inserthtml.php">Inserta productos</a>
        <a href="Deletehtml.php">Elimina productos</a>
        <a href="Uploadhtml.php">Actualiza productos</a>
    </nav>
</footer>

</body>
</html>