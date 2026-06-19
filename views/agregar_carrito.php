<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'cliente') {
    header("Location: index.php?sec=login");
    exit();
}

$id_producto = $_GET['id'] ?? null;

if ($id_producto) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    $_SESSION['carrito'][] = $id_producto;
}

header("Location: index.php?sec=carrito");
exit();