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
        
        if ($imagen !== 'default.png') {
            $ruta_foto = "img/productos/" . $imagen;
            if (file_exists($ruta_foto)) {
                unlink($ruta_foto);
            }
        }
        
        Producto::delete($id);
    }
}

header("Location: index.php?sec=panel_admin");
exit();