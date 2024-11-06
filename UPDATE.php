<?php

if (empty($_POST["id"])) {
    print("<p style='color: red'>No ha escrito el ID</p>");
} else {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];

    $servername = "localhost";
    $username = "laura";
    $password = "123";
    $dbname = "crud_empleados";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE empleados SET nombre= :nombre, edad= :edad WHERE id = :id");

        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {
                echo "Registro actualizado exitosamente.";
            } else {
                echo "No se encontró un registro con el ID proporcionado.";
            }
        } else {
            echo "Error al actualizar el registro.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
print ("<p> Pulsa <a href='MENU.php'>AQUÍ</a> para volver al menú.</p>");
?>