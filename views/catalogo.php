<?php
$cat_seleccionada = $_GET['cat'] ?? null;
$titulo = $cat_seleccionada ? "Unidades: Serie $cat_seleccionada" : "Catálogo Completo de Unidades";
?>
<div class="container py-5 fade-in-up">
    <div class="text-center mb-5">
        <h2 class="display-5 fw-light text-uppercase" style="letter-spacing: 2px;"><?= $titulo; ?></h2>
        <div class="mx-auto" style="width: 50px; height: 2px; background-color: #00b4ff; margin-top: 10px;"></div>
    </div>

    <div class="row g-4">
        <?php foreach ($catalogo as $robot): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card-robot-clinical h-100 shadow-sm border-0">
                    <div class="card-image-container">
                        <img src="img/productos/<?= $robot->getImagen(); ?>" alt="<?= $robot->getNombre(); ?>" class="img-fluid">
                    </div>
                    <div class="card-body-clinical p-4 d-flex flex-column">
                        <span class="category-badge mb-2"><?= $robot->getCategoria(); ?></span>
                        <h3 class="h5 mb-2 fw-bold text-dark"><?= $robot->getNombre(); ?></h3>
                        <p class="text-muted small mb-4"><?= $robot->getDescripcion(); ?></p>
                        <div class="mt-auto">
                            <span class="price-text fw-bold text-marca fs-5 d-block mb-3"><?= $robot->precio_formateado(); ?></span>
                            <div class="d-flex gap-2">
                                <a href="index.php?sec=detalle&id=<?= $robot->getId(); ?>" class="btn btn-outline-secondary btn-sm w-50">Detalles</a>
                                <a href="index.php?sec=agregar_carrito&id=<?= $robot->getId(); ?>&from=catalogo" class="btn btn-marca btn-sm w-50 fw-bold shadow-sm" style="white-space: nowrap;">🛒 Agregar</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>