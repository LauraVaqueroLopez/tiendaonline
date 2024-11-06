<?php
session_start();
require_once '../Modelo/clientesDAO.php';

class ControlCliente {
    public function login($usuario, $contraseña) {
        $clientesDAO = new ClientesDAO();
        $user = $clientesDAO->getClienteByNombre($usuario);

        // Depuración: Imprimir los datos recuperados de la base de datos
        var_dump($user);

        if ($user && password_verify($contraseña, $user['password'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: ../vista/menuhtml.php");
            exit();
        } else {
            $_SESSION['aviso'] = 'Usuario o contraseña incorrectos.';
            header("Location: ../vista/loginhtml.php");
            exit();
        }
    }
}

// Verificamos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $contraseña = trim($_POST['contraseña']);

    // Depuración: Verificar los valores que llegan del formulario
    var_dump($usuario, $contraseña);

    if (!empty($usuario) && !empty($contraseña)) {
        $controller = new ControlCliente();
        $controller->login($usuario, $contraseña);
    } else {
        $_SESSION['aviso'] = 'Por favor, complete todos los campos.';
        header("Location: ../Vista/loginhtml.php");
        exit();
    }
}
?>
