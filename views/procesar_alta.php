<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}

$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$precio = $_POST['precio'] ?? 0;
$fecha_fabricacion = $_POST['fecha_fabricacion'] ?? '';
$descripcion_detallada = $_POST['descripcion_detallada'] ?? '';
$serie_id = $_POST['serie_id'] ?? 1;

$imagen_nombre = 'default.png';
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_nombre = time() . "_1_" . $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "img/productos/" . $imagen_nombre);
}

$imagen_2_nombre = 'default-2.png';
if (isset($_FILES['imagen_2']) && $_FILES['imagen_2']['error'] === UPLOAD_ERR_OK) {
    $imagen_2_nombre = time() . "_2_" . $_FILES['imagen_2']['name'];
    move_uploaded_file($_FILES['imagen_2']['tmp_name'], "img/productos/" . $imagen_2_nombre);
}

Producto::insert($nombre, $descripcion, $precio, $imagen_nombre, $imagen_2_nombre, $fecha_fabricacion, $descripcion_detallada, $serie_id);

header("Location: index.php?sec=panel_admin");
exit();