<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];

    if (!empty($nombre) && !empty($contraseña) && !empty($contraseña2)) {
        if ($contraseña === $contraseña2) {

            $servername = "localhost";
            $username = "laura";
            $password = "123";
            $dbname = "crud_empleados";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("INSERT INTO usuarios (nombre, password) VALUES (:nombre, :password)");

                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':password', $contraseña);

                if ($stmt->execute()) {
                    print "<p>Usuario registrado con éxito</p>";
                    print "<p>Pulse para <a href='loginhtml.php'>ingresar</a></p>";
                } else {
                    echo "Error al crear el registro.";
                }

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $conn = null;

        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "No se han rellenado todos los datos. Rellénelos.";
    }

} else {
    echo "No se ha enviado información desde el formulario.";
}

?>

