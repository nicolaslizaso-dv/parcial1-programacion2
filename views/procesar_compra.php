<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'cliente') {
    header("Location: index.php?sec=login");
    exit();
}

$carrito = $_SESSION['carrito'] ?? [];
$usuario_id = $_SESSION['usuario_id'] ?? null;

if (!empty($carrito) && $usuario_id) {
    Pedido::registrar_compra($usuario_id, $carrito);
    $_SESSION['carrito'] = [];
    header("Location: index.php?sec=compra_exitosa");
    exit();
} else {
    header("Location: index.php?sec=carrito");
    exit();
}