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
$imagen_nombre = '';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_nombre = time() . "_" . $_FILES['imagen']['name'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_destino = "img/productos/" . $imagen_nombre;
    move_uploaded_file($ruta_temporal, $ruta_destino);
} else {
    $imagen_nombre = "default.png";
}

Producto::insert($nombre, $descripcion, $precio, $imagen_nombre, $fecha_fabricacion, $descripcion_detallada, $serie_id);

header("Location: index.php?sec=panel_admin");
exit();