<?php
session_start();
require_once '../Modelo/ClientesDAO.php';

class ControlRegistro {
    public function registrar($nombre, $contraseña) {
        $clienteDAO = new ClientesDAO();

        // Verificar si el cliente ya está registrado
        $clienteExistente = $clienteDAO->getClienteByNombre($nombre);

        if ($clienteExistente) {
            $_SESSION['aviso'] = 'El nombre de cliente ya está en uso.';
            header('Location: ../Vista/Registro.php');
            exit();
        }

        // Registrar el nuevo cliente con la contraseña tal cual se ingresó
        if ($clienteDAO->addCliente($nombre, $contraseña)) {
            $_SESSION['aviso'] = 'Cliente registrado exitosamente.';
            header('Location: ../Vista/loginhtml.php');
            exit();
        } else {
            $_SESSION['aviso'] = 'Hubo un error al registrar el cliente.';
            header('Location: ../Vista/Registro.php');
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    if (!empty($nombre) && !empty($contraseña)) {
        $controller = new ControlRegistro();
        $controller->registrar($nombre, $contraseña);
    } else {
        $_SESSION['aviso'] = 'Por favor, complete todos los campos.';
        header('Location: ../Vista/Registro.php');
        exit();
    }
}
?>
