<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        .aviso {
            color: red;
        }
    </style>
</head>
<body>
<h2>Iniciar sesión</h2>
<form action="../Controlador/ControlCliente.php" method="POST">
    <p><label>Usuario: <input type="text" name="usuario" required></label></p>
    <p><label>Contraseña: <input type="password" name="contraseña" required></label></p>
    <p><input type="submit" value="Ingresar"></p>
    <button type="button" onclick="window.location.href='Registro.php'">Registrarse</button>

    <?php
    session_start();
    if (isset($_SESSION['aviso'])) {
        echo '<span class="aviso">' . htmlspecialchars($_SESSION['aviso']) . '</span>';
        unset($_SESSION['aviso']);
    }
    ?>
</form>
</body>
</html>
