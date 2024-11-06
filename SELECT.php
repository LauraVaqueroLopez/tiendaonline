<?php

if (empty($_REQUEST["id"])) {
    print("<p style='color: red'>No ha escrito el ID</p>");
} else {
    $id = $_POST["id"];

    $servername = "localhost";
    $username = "laura";
    $password = "123";
    $dbname = "crud_empleados";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT nombre, edad FROM empleados WHERE id = :id");

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<p>Nombre: " . htmlspecialchars($result['nombre']) . "</p>";
                echo "<p>Edad: " . htmlspecialchars($result['edad']) . "</p>";
            } else {
                echo "<p>No se encontró un registro con el ID proporcionado.</p>";
            }
        } else {
            echo "<p>Error al realizar la consulta.</p>";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

print("<p>Pulsa <a href='MENU.php'>AQUÍ</a> para volver al menú.</p>");
?>
