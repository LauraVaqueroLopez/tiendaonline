<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Almacenamiento de datos en sesión</title>
</head>
<body>

<?php
session_start();
?>

<h3>Usuario conectado: <?php echo $_SESSION["usuario"]?></h3>

<form action="DELETE.php" method="post">
    <p><label>Escriba su id: <input type="text" name="id"></label></p>

    <p>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </p>
</form>
</body>
</html>
