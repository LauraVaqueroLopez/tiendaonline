<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cliente</title>
    <style>
        .aviso {
            color: red;
        }
    </style>
</head>
<body>
<h2>Registrar nuevo cliente</h2>
<form action="../Controlador/ControlRegistro.php" method="POST">
    <p><label>Nombre: <input type="text" name="nombre"></label></p>
    <p><label>Contraseña: <input type="password" name="contraseña"></label></p>
    <p><input type="submit" value="Registrar"></p>
    <button type="button" onclick="window.location.href='loginhtml.php'">Ya tengo una cuenta</button>

    <?php
    session_start();
    if (isset($_SESSION['aviso'])) {
        print '<span class="aviso">' . htmlspecialchars($_SESSION['aviso']) . '</span>';
        unset($_SESSION['aviso']);
    }
    ?>
</form>
</body>
</html>
