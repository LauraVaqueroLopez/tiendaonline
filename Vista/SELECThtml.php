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

<form action="SELECT.php" method="post">

    <p><label>Introduce el id a buscar: <input type="number" name="id"></label></p>

    <p>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </p>
</form>
</body>
</html>