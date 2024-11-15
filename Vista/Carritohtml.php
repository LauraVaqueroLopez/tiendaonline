<?php
session_start();
require_once '../controlador/ControlProducto.php';
if (!isset($_SESSION['usuario'])) {
    header("Location:loginhtml.php");
    exit();
}
//crear variable carrito
$carrito = $_SESSION['carrito'];

$controlProducto = new ControlProducto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<header>
    <h1>My Techno - Carrito</h1>
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
    <section>
        <h2>Tu Carrito de Compras</h2>
        <?php if (empty($carrito)) : ?>
            <p>No hay productos en tu carrito.</p>
        <?php else: ?>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /*
                 * se crea en la sesion una variable llamada carrito. Que se guarda como [ [id_producto], [cantidad] ]
                 * controles en menuhtml
                */
                foreach ($carrito as $id_producto => $cantidad) :
                    $producto = $controlProducto->obtenerProductoPorId($id_producto);
                    ?>
                    <tr>
                        <td><?php echo $id_producto; ?></td>
                        <td><?php echo $producto->getNombre(); ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td>
                            <form action="../Controlador/ControlEliminarDelCarrito.php" method="POST"">
                                <input type="hidden" name="id" value="<?php echo $id_producto; ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <form action="../Controlador/ControlVaciarCarrito.php" method="post">
                <button type="submit">Vaciar Carrito</button>
            </form>
        <?php endif; ?>
    </section>
</main>
</body>
</html>