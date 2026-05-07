<?php
$id_seleccionado = $_GET['id'] ?? null;
$robot = null;

foreach ($catalogo as $r) {
    if ($r->id == $id_seleccionado) {
        $robot = $r;
        break;
    }
}


$nombre_base = str_replace(".png", "", $robot->imagen);
$foto_detalle = "img/productos/" . $nombre_base . "-2.png";
?>

<div class="container py-5 fade-in-up">
    <?php if ($robot): ?>
        <div class="row g-5 align-items-center">
            <div class="col-md-6">
                <div class="detail-image-box bg-white border shadow-sm">
                    <img src="<?= $foto_detalle; ?>" alt="<?= $robot->nombre; ?> - Detalle Técnico">
                </div>
            </div>

            <div class="col-md-6">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php?sec=catalogo">Catálogo</a></li>
                        <li class="breadcrumb-item active"><?= $robot->categoria; ?></li>
                    </ol>
                </nav>

                <h2 class="display-5 fw-bold mb-2"><?= $robot->nombre; ?></h2>
                <p class="text-primary fw-bold text-uppercase small mb-4" style="letter-spacing: 2px;">Serie #<?= $robot->id; ?></p>
                
                <h3 class="h2 fw-light mb-4"><?= $robot->precio_formateado(); ?></h3>
                
                <hr class="my-4">

                <div class="mb-5">
                    <h4 class="h6 text-uppercase fw-bold text-muted mb-3">Especificaciones de la Unidad</h4>
                    <p class="text-secondary lh-lg"><?= $robot->descripcion_detallada; ?></p>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-dark btn-lg rounded-0 py-3 text-uppercase small fw-bold">Reservar Unidad</button>
                    <a href="index.php?sec=catalogo" class="btn btn-outline-secondary btn-sm border-0 mt-2">← Volver al catálogo</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <h2 class="display-6">Unidad no localizada.</h2>
            <a href="index.php?sec=catalogo" class="btn-cyber mt-4">Regresar</a>
        </div>
    <?php endif; ?>
</div>