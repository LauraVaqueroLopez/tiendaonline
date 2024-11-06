<?php

if (empty($_REQUEST["nombre"]) && empty($_REQUEST["edad"])) {
    print("<p style='color: red'>No ha escrito su nombre y edad</p>");
} elseif (empty($_REQUEST["nombre"]) && !empty($_REQUEST["edad"])) {
    print("<p style='color: red'>No ha escrito su nombre</p>");
} elseif (empty($_REQUEST["edad"]) && !empty($_REQUEST["nombre"])) {
    print("<p style='color: red'>No ha escrito su edad</p>");
} else {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $id = $_POST["id"];

    $servername = "localhost";
    $username = "laura";
    $password = "123";
    $dbname = "crud_empleados";

    // Create connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO empleados (id, nombre, edad) VALUES (:id, :nombre, :edad)");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':edad', $edad);

        if ($stmt->execute()) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error al crear el registro.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
print ("<p> Pulsa <a href='MENU.php'>AQUÍ</a> para volver al menú.</p>");

?>

