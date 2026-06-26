<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberLife - Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase" href="index.php?sec=panel_admin" style="letter-spacing: 2px;">CyberLife Admin</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="adminMenu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $seccion == 'panel_admin' ? 'active fw-bold text-white' : '' ?>" href="index.php?sec=panel_admin">Unidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $seccion == 'panel_categorias' ? 'active fw-bold text-white' : '' ?>" href="index.php?sec=panel_categorias">Series / Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $seccion == 'panel_pedidos' ? 'active fw-bold text-white' : '' ?>" href="index.php?sec=panel_pedidos">Pedidos</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                    <span class="text-info small fw-bold">Admin: <?= $_SESSION['usuario_nombre'] ?></span>
                    <a href="../index.php?sec=home" class="btn btn-outline-light btn-sm fw-bold">Volver a la Tienda</a>
                </div>
            </div>
        </div>
    </nav>