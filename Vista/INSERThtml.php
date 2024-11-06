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

    <form action="INSERT.php" method="post">

        <p><label>Escriba el id: <input type="text" name="id"></label></p>
        <p><label>Escriba el nombre: <input type="text" name="nombre"></label></p>
        <p><label>Escriba la edad: <input type="number" name="edad"></label></p>

        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
    </form>
    </body>
</html>