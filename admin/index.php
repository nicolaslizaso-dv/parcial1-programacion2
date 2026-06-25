<?php
session_start();
require_once "../classes/Conexion.php";
require_once "../classes/Producto.php";
require_once "../classes/Categoria.php";
require_once "../classes/Usuario.php";

if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: ../index.php?sec=home");
    exit();
}

$secciones_validas = [
    'panel_admin', 'form_alta', 'form_edicion', 
    'panel_categorias', 'form_alta_categoria', 'form_edicion_categoria'
];

$seccion = $_GET['sec'] ?? "panel_admin";

if (!in_array($seccion, $secciones_validas)) {
    header("Location: index.php?sec=panel_admin");
    exit();
}

require_once "includes/header.php";
?>

<main class="container">
    <?php require_once "views/$seccion.php"; ?>
</main>

<?php 
require_once "includes/footer.php"; 
?>