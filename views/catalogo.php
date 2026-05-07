<?php
$cat_seleccionada = $_GET['cat'] ?? null;

$titulo = $cat_seleccionada ? "Unidades Serie: $cat_seleccionada" : "Catálogo Completo de Unidades";
?>

<div class="container py-5 fade-in-up">
    <div class="text-center mb-5">
        <h2 class="display-5 fw-light text-uppercase" style="letter-spacing: 2px;"><?= $titulo; ?></h2>
        <div class="mx-auto" style="width: 50px; height: 2px; background-color: #00b4ff; margin-top: 10px;"></div>
    </div>

    <div class="row g-4">
        <?php foreach ($catalogo as $robot): 
            if ($cat_seleccionada !== null && $robot->categoria !== $cat_seleccionada) {
                continue; 
            }
        ?>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card-robot-clinical">
                    <div class="card-image-container">
                        <img src="img/productos/<?= $robot->imagen; ?>" alt="<?= $robot->nombre; ?>">
                    </div>
                    
                    <div class="card-body-clinical">
                        <span class="category-badge"><?= $robot->categoria; ?></span>
                        <h3 class="h5 mb-3 fw-bold text-dark"><?= $robot->nombre; ?></h3>
                        <p class="text-muted small mb-4"><?= $robot->descripcion; ?></p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="price-text"><?= $robot->precio_formateado(); ?></span>
                            <a href="index.php?sec=detalle&id=<?= $robot->id; ?>" class="btn-detail">VER FICHA</a>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>