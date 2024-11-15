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
    <title>Insert - Tienda My Tech</title>
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
        <h1> Añadir Productos </h1>
        <form action="../Controlador/ControlPeticionProductos.php" method="POST">

            <label> Nombre: </label><br>
            <input type="text" name="nombre"><br><br>

            <label> Descripcion </label><br>
            <input type="text" name="descripcion"><br><br>

            <label> Precio: </label><br>
            <input type="number" name="precio"><br><br>

            <input type="hidden" name="accion" value="agregar">
            <button type="submit">Agregar Producto</button>

        </form><br><br>
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