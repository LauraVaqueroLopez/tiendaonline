<?php
session_start();

$servername = "localhost";
$username = "laura";
$password = "123";
$dbname = "crud_empleados";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if (!empty($usuario) && !empty($contraseña)) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
            $stmt->bindParam(':nombre', $usuario);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['password'] === $contraseña) {

                    $_SESSION['usuario'] = $usuario;
                    header("Location: MENU.php");
                    exit();
                } else {
                    $_SESSION['aviso'] = "Contraseña incorrecta.";
                    header("Location: loginhtml.php");
                    exit();
                }
            } else {
                $_SESSION['aviso'] = "Usuario no encontrado.";
                header("Location: loginhtml.php");
                exit();
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    } else {
        $_SESSION['aviso'] = "Por favor, rellene todos los campos.";
        header("Location: loginhtml.php");
        exit();
    }
} else {
    $_SESSION['aviso'] = "No se ha enviado información desde el formulario.";
    header("Location: loginhtml.php");
    exit();
}
?>




