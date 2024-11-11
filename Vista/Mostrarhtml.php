<?php


session_start();
require_once '../controlador/ControlProducto.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: loginhtml.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    require_once '../Controlador/ControlSelectID.php';
    $controlSelectID = new ControlSelectID();
    $producto = $controlSelectID->listarPorID();

    if ($producto) {
        echo "<h3>Producto encontrado:</h3>";
        echo "<p>ID: " . $producto->getId() . "</p>";
        echo "<p>Nombre: " . $producto->getNombre() . "</p>";
        echo "<p>Descripción: " . $producto->getDescripcion() . "</p>";
        echo "<p>Precio: $" . $producto->getPrecio() . "</p>";
    } else {
        echo "<p>Producto no encontrado.</p>";
    }
    header("Location: Mostrarhtml.php");
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Laura's Photography Studio</title>
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
        <li> <a href=""> Usuario: <?php echo $_SESSION["usuario"]?></a></li>
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
        <form action="../Controlador/ControlSelectID.php" method="post">
            <p><label>ID del producto: <input type="number" name=id" required></label></p>
            <p><input type="submit" value="Mostrar"></p>

            <?php

            if (isset($_SESSION['aviso'])) {
                echo '<span class="aviso">' . htmlspecialchars($_SESSION['aviso']) . '</span>';
                unset($_SESSION['aviso']);
            }

            ?>

        </form>

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
