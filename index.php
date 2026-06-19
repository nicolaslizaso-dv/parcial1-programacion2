<?php
session_start();
require_once "classes/Producto.php";
require_once "classes/Secciones.php";
require_once "classes/Usuario.php";
require_once "classes/Pedido.php";

$secciones_objetos = Secciones::secciones_del_sitio();
$secciones_validas = Secciones::secciones_validas();

$seccion = $_GET['sec'] ?? "home";

if (!in_array($seccion, $secciones_validas)) {
    $seccion = "404";
}

$archivo_vista = "views/$seccion.php";
if (!file_exists($archivo_vista)) {
    $seccion = "404";
}

$titulo_pagina = "CyberLife";
foreach ($secciones_objetos as $s) {
    if ($s->getVinculo() == $seccion) {
        $titulo_pagina = "CyberLife - " . $s->getTitle();
    }
}

$categoria = $_GET['cat'] ?? null;
if ($seccion == 'catalogo') {
    $catalogo = $categoria ? Producto::catalogo_x_categoria($categoria) : Producto::catalogo_completo();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberLife <?= ucfirst($seccion); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <?php include_once "includes/header.php"; ?>

    <main class="container-fluid px-4 px-md-0">
        <?php include_once "views/$seccion.php"; ?>
    </main>

    <?php include_once "includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>