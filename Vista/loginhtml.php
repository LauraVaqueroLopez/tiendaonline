<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Almacenamiento de datos en sesión</title>
    <style>
        .aviso {
            color: red;
        }
    </style>
</head>
<body>

<?php
session_start();
?>

<form action="login.php" method="post">
    <p><label>USUARIO: <input type="text" name="usuario"></label></p>
    <p><label>CONTRASEÑA: <input type="password" name="contraseña"></label></p>

    <p>
        <input type="submit" value="Ingresar">
        <button type="button" onclick="window.location.href='registrohtml.php'">Registrarse</button>
    </p>

    <?php
    if (isset($_SESSION['aviso'])) {
        echo '<span class="aviso">' . htmlspecialchars($_SESSION['aviso']) . '</span>';
        unset($_SESSION['aviso']);
    }
    ?>
</form>

</body>
</html>
