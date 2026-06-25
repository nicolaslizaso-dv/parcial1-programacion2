<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (Usuario::loguear($email, $password)) {
    if ($_SESSION['usuario_rol'] === 'admin') {
        header("Location: admin/index.php?sec=panel_admin");
    } else {
        header("Location: index.php?sec=home");
    }
    exit();
} else {
    header("Location: index.php?sec=login&error=true");
    exit();
}