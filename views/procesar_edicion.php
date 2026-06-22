<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}

$id = $_POST['id'] ?? null;
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$precio = $_POST['precio'] ?? 0;
$fecha_fabricacion = $_POST['fecha_fabricacion'] ?? '';
$descripcion_detallada = $_POST['descripcion_detallada'] ?? '';
$serie_id = $_POST['serie_id'] ?? 1;

$imagen_actual = $_POST['imagen_actual'] ?? 'default.png';
$imagen_final = $imagen_actual; 

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_final = time() . "_1_" . $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "img/productos/" . $imagen_final);
    if ($imagen_actual !== 'default.png' && file_exists("img/productos/" . $imagen_actual)) {
        unlink("img/productos/" . $imagen_actual);
    }
}

$imagen_actual_2 = $_POST['imagen_actual_2'] ?? 'default-2.png';
$imagen_final_2 = $imagen_actual_2; 

if (isset($_FILES['imagen_2']) && $_FILES['imagen_2']['error'] === UPLOAD_ERR_OK) {
    $imagen_final_2 = time() . "_2_" . $_FILES['imagen_2']['name'];
    move_uploaded_file($_FILES['imagen_2']['tmp_name'], "img/productos/" . $imagen_final_2);
    if ($imagen_actual_2 !== 'default-2.png' && $imagen_actual_2 !== '' && file_exists("img/productos/" . $imagen_actual_2)) {
        unlink("img/productos/" . $imagen_actual_2);
    }
}

Producto::edit($id, $nombre, $descripcion, $precio, $imagen_final, $imagen_final_2, $fecha_fabricacion, $descripcion_detallada, $serie_id);

header("Location: index.php?sec=panel_admin");
exit();