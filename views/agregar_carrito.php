<?php
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] === 'admin') {
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

if (isset($_GET['from'])) {
    $_SESSION['cart_notif'] = true; 
    
    if ($_GET['from'] === 'home') {
        header("Location: index.php?sec=home#seccion-catalogo-home");
    } else {
        header("Location: index.php?sec=catalogo");
    }
    exit();
} 

header("Location: index.php?sec=carrito");
exit();