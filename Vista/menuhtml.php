<?php
session_start();
require_once '../controlador/ControlProducto.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: loginhtml.php");
    exit();
}

$controlProducto = new ControlProducto();
$productos = $controlProducto->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura's Photography Studio</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<header>
    <h1>My Techno</h1>
</header>
<nav>
    <ul>
        <li><a href="menuhtml.php">Inicio</a></li>
        <li><a href="Mostrarhtml.php">Mostrar productos con id</a> </li>
        <li><a href="Inserthtml.php">Inserta productos</a></li>
        <li><a href="Deletehtml.php">Elimina productos</a></li>
        <li><a href="Uploadhtml.php">Actualiza productos</a></li>
    </ul>
</nav>
<main>
    <aside id="site-map">
        <h3>Mapa del Sitio</h3>
        <ul>
            <li><a href="menuhtml.php">Inicio</a></li>
            <li><a href="Mostrarhtml.php">Mostrar productos con id</a></li>
            <li><a href="Inserthtml.php">Inserta productos</a></li>
            <li><a href="Deletehtml.php">Elimina productos</a></li>
            <li><a href="Uploadhtml.php">Actualiza productos</a></li>
        </ul>
    </aside>
    <section>
        <h2>Bienvenidos a My Techno</h2>
        <h3>La tienda donde podrás encontrar todo tipo de material informático de la máxima calidad posible ;).</h3>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>&nbsp;&nbsp;&nbsp;Precio</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto->getId(); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $producto->getNombre(); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $producto->getDescripcion(); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $producto->getPrecio(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
