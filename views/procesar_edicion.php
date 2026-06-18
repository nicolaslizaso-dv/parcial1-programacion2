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
    
    $imagen_final = time() . "_" . $_FILES['imagen']['name'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_destino = "img/productos/" . $imagen_final;
    move_uploaded_file($ruta_temporal, $ruta_destino);

    if ($imagen_actual !== 'default.png') {
        $ruta_vieja = "img/productos/" . $imagen_actual;
        if (file_exists($ruta_vieja)) {
            unlink($ruta_vieja);
        }
    }
}

Producto::edit($id, $nombre, $descripcion, $precio, $imagen_final, $fecha_fabricacion, $descripcion_detallada, $serie_id);

header("Location: index.php?sec=panel_admin");
exit();