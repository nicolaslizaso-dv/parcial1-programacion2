<?php
$id_seleccionado = $_GET['id'] ?? null;
$robot = Producto::producto_x_id($id_seleccionado);

if (!$robot) {
    header("Location: index.php?sec=404");
    exit();
}
?>
<div class="container py-5 fade-in-up">
    <?php if ($robot): ?>
        <div class="row g-5 align-items-center">
            <div class="col-md-6">
                <div class="detail-image-box bg-white border shadow-sm p-3">
                    <img src="img/productos/<?= $robot->getImagen2(); ?>" alt="<?= $robot->getNombre(); ?>" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php?sec=catalogo" class="text-decoration-none">Catálogo</a></li>
                        <li class="breadcrumb-item active"><?= $robot->getCategoria(); ?></li>
                    </ol>
                </nav>
                <h2 class="display-5 fw-bold mb-2"><?= $robot->getNombre(); ?></h2>
                <p class="text-marca fw-bold text-uppercase mb-4" style="letter-spacing: 2px;">Unidad Certificada CyberLife</p>
                <div class="mb-5">
                    <h4 class="h6 text-uppercase fw-bold text-muted mb-3">Especificaciones de la Unidad</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Fecha de fabricación:</strong> 
                            <?php 
                                $fecha = new DateTime($robot->getFechaFabricacion());
                                echo $fecha->format('d/m/Y'); 
                            ?>
                        </li>
                        <li class="mb-2"><strong>Categoría:</strong> <?= $robot->getCategoria(); ?></li>
                    </ul>
                    <p class="text-secondary lh-lg mt-3"><?= $robot->getDescripcionDetallada(); ?></p>
                </div>
                <div class="d-grid gap-2">
                    <a href="index.php?sec=agregar_carrito&id=<?= $robot->getId(); ?>" class="btn btn-marca btn-sm fw-bold">Agregar al Carrito</a>
                    <a href="index.php?sec=catalogo" class="btn btn-outline-secondary btn-sm border-0 mt-2">← Volver al catálogo</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <h2 class="display-6">Unidad no localizada en la red.</h2>
            <a href="index.php?sec=catalogo" class="btn btn-marca mt-4">Regresar al Catálogo</a>
        </div>
    <?php endif; ?>
</div>