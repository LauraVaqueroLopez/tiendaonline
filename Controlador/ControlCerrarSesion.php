<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

header("Location: ../Vista/loginhtml.php");
exit();
?>