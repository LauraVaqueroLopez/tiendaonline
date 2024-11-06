<?php

if (empty($_REQUEST["id"])) {
    print("<p style='color: red'>No ha escrito el id</p>");
} else {
    $id = $_POST["id"];

    $servername = "localhost";
    $username = "laura";
    $password = "123";
    $dbname = "crud_empleados";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM empleados WHERE id = :id");

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {
                echo "Registro eliminado exitosamente.";
            } else {
                echo "No se encontró un registro con el id proporcionado.";
            }
        } else {
            echo "Error al eliminar el registro.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

print ("<p> Pulsa <a href='MENU.php'>AQUÍ</a> para volver al menú.</p>")
?>
