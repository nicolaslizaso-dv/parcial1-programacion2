<?php
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (Usuario::registrar($nombre, $email, $password)) {
    header("Location: index.php?sec=login");
    exit();
} else {
    header("Location: index.php?sec=registro&error=true");
    exit();
}