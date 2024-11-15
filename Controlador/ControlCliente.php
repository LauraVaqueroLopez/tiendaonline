<?php
session_start();
require_once '../Modelo/clientesDAO.php';

class ControlCliente {
    public function login($usuario, $contraseña) {
        $clientesDAO = new ClientesDAO();
        $cliente = $clientesDAO->getClienteByNombre($usuario);

        if ($cliente && $cliente['password'] === $contraseña) {
            $_SESSION['usuario'] = $usuario;
            header("Location: ../vista/menuhtml.php");
            exit();
        } else {
            // Si usuario o contraseña son incorrectos, mostramos aviso
            $_SESSION['aviso'] = 'Usuario o contraseña incorrectos.';
            header("Location: ../vista/loginhtml.php");
            exit();
        }
    }
}

// Verificamos si el formulario se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $contraseña = trim($_POST['contraseña']);

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