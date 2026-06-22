<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}

$id = $_GET['id'] ?? null;

if ($id) {
    $robot = Producto::producto_x_id($id);
    
    if ($robot) {
        $imagen = $robot->getImagen();
        $imagen_2 = $robot->getImagen2();
        
        if ($imagen !== 'default.png' && file_exists("img/productos/" . $imagen)) {
            unlink("img/productos/" . $imagen);
        }
        
        if ($imagen_2 !== 'default-2.png' && $imagen_2 !== '' && file_exists("img/productos/" . $imagen_2)) {
            unlink("img/productos/" . $imagen_2);
        }
        
        Producto::delete($id);
    }
}

header("Location: index.php?sec=panel_admin");
exit();