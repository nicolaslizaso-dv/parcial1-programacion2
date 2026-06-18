<header class="bg-white border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light container py-3">
        <a class="navbar-brand" href="index.php?sec=home">
            <img src="img/assets/logo.png" alt="CyberLife Logo" class="logo-header" style="max-width: 180px;">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuPrincipal">
            
            <ul class="navbar-nav gap-lg-3 text-center mt-4 mt-lg-0 mx-auto">
                <?php foreach ($secciones_objetos as $s): 
                    if (!$s->getInMenu()) continue; 

                    $clase_active = '';
                    if ($seccion == $s->getVinculo()) {
                        if ($s->getVinculo() == 'catalogo') {
                            if (!isset($_GET['cat'])) {
                                $clase_active = 'active';
                            }
                        } else {
                            $clase_active = 'active';
                        }
                    }
                ?>
                    <li class="nav-item">
                        <a href="index.php?sec=<?= $s->getVinculo() ?>" class="nav-link <?= $clase_active ?>">
                            <?= $s->getTexto() ?>
                        </a>
                    </li>

                    <?php if ($s->getVinculo() == 'catalogo'): ?>
                        <?php foreach (Producto::categorias_disponibles() as $cat_menu): ?>
                            <li class="nav-item">
                                <a href="index.php?sec=catalogo&cat=<?= $cat_menu ?>" class="nav-link <?= (isset($_GET['cat']) && $_GET['cat'] == $cat_menu) ? 'active' : '' ?>">
                                    Serie <?= $cat_menu ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <ul class="navbar-nav gap-2 text-center mt-4 mt-lg-0 align-items-center">
                <?php if(isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item me-2">
                        <span class="text-muted small fw-bold text-uppercase">Hola, <?= $_SESSION['usuario_nombre'] ?></span>
                    </li>
                    
                    <?php if($_SESSION['usuario_rol'] == 'admin'): ?>
                        <li class="nav-item">
                            <a href="index.php?sec=panel_admin" class="btn btn-sm btn-dark fw-bold">Panel de Control</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?sec=carrito" class="btn btn-sm btn-outline-primary fw-bold">Mi Carrito</a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a href="index.php?sec=logout" class="btn btn-sm btn-danger fw-bold">Salir</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php?sec=login" class="btn btn-sm btn-outline-primary fw-bold text-uppercase">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?sec=registro" class="btn btn-sm btn-primary fw-bold text-uppercase">Registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>
</header>