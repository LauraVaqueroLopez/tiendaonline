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
  <title>Quiénes Somos - Laura's photography Studio</title>
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
        h1> Añadir Productos </h1>
        <form action="../Controlador/ControlAddProductos.php" method="POST">

            <label for="id"> ID: </label>
            <input type="number" name="id" id="id" ><br><br>

            <label for="nombre"> Nombre: </label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="descripcion"> Descripcion </label>
            <textarea id="descripcion" name="descripcion" required></textarea><br><br>

            <label for="precio"> Precio: </label>
            <input type="number" id="precio" name="precio" required><br><br>

            <label for="Cliente_id"> Cliente_ID: </label>
            <input type="number" name="Cliente_id" id="Cliente_id" required>

            <input type="hidden" name="accion" value="agregar">
            <button type="submit">Agregar Producto</button>

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
