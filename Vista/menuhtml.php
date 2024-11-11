<?php
session_start();
require_once '../controlador/ControlProducto.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: loginhtml.php");
    exit();
}

$controlProducto = new ControlProducto();
$productos = $controlProducto->listarProductos();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
function agregarAlCarrito($id_producto) {
    if (isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto]++;
    } else {
        $_SESSION['carrito'][$id_producto] = 1;
    }
}


if (isset($_POST['agregar'])) {
    $id_producto = $_POST['id_producto'];
    agregarAlCarrito($id_producto);
    header("Location: menuhtml.php");
    exit();
}


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
        <h2>Bienvenidos a My Techno</h2>
        <h3>La tienda donde podrás encontrar todo tipo de material informático de la máxima calidad posible ;).</h3>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>&nbsp;&nbsp;&nbsp;Precio</th>
                <th>&nbsp;&nbsp;&nbsp;Añadir al Carrito</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto->getId(); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $producto->getNombre(); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $producto->getDescripcion(); ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $producto->getPrecio(); ?></td>
                    <td>
                        <!-- Botón de añadir al carrito -->
                        <form action="menuhtml.php" method="post">
                            <input type="hidden" name="id_producto" value="<?php echo $producto->getId(); ?>">
                            &nbsp;&nbsp;
                            <button type="submit" name="agregar" class="btn">Añadir al carrito</button>
                        </form>
                    </td>
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
