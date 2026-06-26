<?php
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (Usuario::registrar($nombre, $email, $password)) {
    
    Usuario::loguear($email, $password);
    $_SESSION['registro_notif'] = true;
    header("Location: index.php?sec=catalogo");
    exit();
    
} else {
    header("Location: index.php?sec=registro&error=true");
    exit();
}