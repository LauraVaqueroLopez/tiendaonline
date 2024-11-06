<?php
session_start();
require_once '../models/UsuarioDAO.php';

class LoginController {
    public function login($usuario, $contraseña) {
        $usuarioDAO = new UsuarioDAO();
        $user = $usuarioDAO->getUsuarioByNombre($usuario);

        if ($user && $user['password'] === $contraseña) {
            // Establecer la sesión del usuario
            $_SESSION['usuario'] = $usuario;
            header("Location: ../views/menu.php");
            exit();
        } else {
            $_SESSION['aviso'] = 'Usuario o contraseña incorrectos.';
            header("Location: ../views/login.php");
            exit();
        }
    }
}

// Verificamos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if (!empty($usuario) && !empty($contraseña)) {
        $controller = new LoginController();
        $controller->login($usuario, $contraseña);
    } else {
        $_SESSION['aviso'] = 'Por favor, complete todos los campos.';
        header("Location: ../views/login.php");
        exit();
    }
}
?>
