<?php
$cat_home = $_GET['cat_home'] ?? 'todas';
$categorias_home = Categoria::lista_completa();

if ($cat_home !== 'todas') {
    $productos_home = Producto::catalogo_x_categoria($cat_home);
} else {
    $productos_home = Producto::catalogo_completo();
}

shuffle($productos_home);
$productos_home = array_slice($productos_home, 0, 6);
?>

<section class="hero-section">
    <div class="container text-center fade-in-up">
        <p class="text-uppercase mb-2" style="letter-spacing: 5px; color: #00b4ff; font-size: 0.7rem;">Innovación para la humanidad</p>
        <h1 class="display-3 hero-title mb-4">Bienvenidos a <span>CyberLife</span></h1>
        <p class="lead text-muted mb-5">Líderes mundiales en el diseño y fabricación de androides de alta fidelidad.</p>
        <a href="index.php?sec=catalogo" class="btn-cyber">Ver Catálogo de Unidades</a>
    </div>
</section>

<section class="container my-5 py-5">
    <div class="row align-items-center">
        <div class="col-md-6 pr-md-5 fade-in-up">
            <h2 class="h2 font-weight-light mb-4">La vida, perfeccionada.</h2>
            <p class="text-muted">En <strong>CyberLife</strong>, nuestra misión es simple: mejorar la calidad de vida humana mediante la integración de tecnología biónica avanzada. Nuestras unidades de las series HG, TR y DF están diseñadas para ser indistinguibles de la excelencia.</p>
            <p class="text-muted">Cada componente es ensamblado bajo <strong>estrictos</strong> controles de calidad en nuestra planta automatizada, garantizando una eficiencia del 99.9% en todas las tareas asignadas.</p>
            <p class="text-muted">Explore nuestro <strong>catálogo</strong> para descubrir cómo nuestras soluciones robóticas están redefiniendo sectores completos, desde la asistencia doméstica hasta operaciones de seguridad complejas, todo con el respaldo y la confiabilidad inigualable de nuestra marca.</p>
        </div>
        <div class="col-md-6 text-right fade-in-up">
            <img src="img/assets/home1.png" alt="Tecnología CyberLife" class="img-fluid" style="filter: grayscale(20%); opacity: 0.9;">
        </div>
    </div>
</section>

<section class="container my-5 py-5 border-top" id="seccion-catalogo-home">
    <div class="text-center mb-5 fade-in-up">
        <h2 class="display-5 fw-light text-uppercase" style="letter-spacing: 2px;">Catálogo</h2>
        <div class="mx-auto" style="width: 50px; height: 2px; background-color: #00b4ff; margin-top: 10px;"></div>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5 fade-in-up">
        <a href="index.php?sec=home#seccion-catalogo-home" class="btn <?= $cat_home === 'todas' ? 'btn-marca' : 'btn-outline-secondary' ?> rounded-pill px-4 fw-bold shadow-sm">Todas las Series</a>
        
        <?php foreach ($categorias_home as $c): ?>
            <a href="index.php?sec=home&cat_home=<?= $c->getNombre() ?>#seccion-catalogo-home" class="btn <?= $cat_home === $c->getNombre() ? 'btn-marca' : 'btn-outline-secondary' ?> rounded-pill px-4 fw-bold shadow-sm">
                Serie <?= $c->getNombre() ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="row g-4 fade-in-up">
        <?php foreach ($productos_home as $robot): ?>
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
                                <a href="index.php?sec=agregar_carrito&id=<?= $robot->getId(); ?>&from=home" class="btn btn-marca btn-sm w-50 fw-bold shadow-sm" style="white-space: nowrap;">🛒 Agregar</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-5 fade-in-up">
        <a href="index.php?sec=catalogo" class="btn btn-outline-secondary px-5 py-3 text-uppercase fw-bold shadow-sm" style="letter-spacing: 1px;">Ver Todo el Catálogo</a>
    </div>
</section>