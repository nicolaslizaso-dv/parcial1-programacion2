<?php
$categorias_header = Categoria::lista_completa();
?>
<header class="bg-white border-bottom position-sticky top-0 shadow-sm" style="z-index: 1000;">
    <nav class="navbar navbar-expand-lg navbar-light container py-3">
        <a class="navbar-brand" href="index.php?sec=home">
            <img src="img/assets/logo.png" alt="CyberLife Logo" class="logo-header" style="max-width: 180px;">
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="menuPrincipal">
            
            <ul class="navbar-nav gap-lg-3 text-center mt-4 mt-lg-0 mx-auto fw-semibold">
                <li class="nav-item">
                    <a href="index.php?sec=home" class="nav-link <?= ($seccion == 'home') ? 'active' : '' ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?sec=catalogo" class="nav-link <?= ($seccion == 'catalogo' && !isset($_GET['cat'])) ? 'active' : '' ?>">Todos los androides</a>
                </li>
                
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle <?= (isset($_GET['cat'])) ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Series
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm mt-0 rounded-3" aria-labelledby="navbarDropdown">
                        <?php foreach($categorias_header as $cat_menu): ?>
                            <li>
                                <a class="dropdown-item py-2 px-4" href="index.php?sec=catalogo&cat=<?= $cat_menu->getNombre() ?>">
                                    Serie <?= $cat_menu->getNombre() ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="index.php?sec=contacto" class="nav-link <?= ($seccion == 'contacto') ? 'active' : '' ?>">Contacto</a>
                </li>
                </ul>

            <ul class="navbar-nav gap-lg-3 text-center mt-4 mt-lg-0 align-items-center fw-semibold">
                <?php if(isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item me-lg-2">
                        <span class="text-muted small fw-bold text-uppercase d-block mb-3 mb-lg-0" style="padding: 5px 0;">Hola, <?= $_SESSION['usuario_nombre'] ?></span>
                    </li>
                    
                    <?php if($_SESSION['usuario_rol'] == 'admin'): ?>
                        <li class="nav-item">
                            <a href="admin/index.php" class="btn btn-dark px-4 rounded-pill fw-bold shadow-sm">Panel de Control</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?sec=carrito" class="nav-link <?= ($seccion == 'carrito') ? 'active' : '' ?>">🛒 Mi Carrito</a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a href="index.php?sec=logout" class="nav-link text-danger">Salir</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php?sec=login" class="nav-link <?= ($seccion == 'login') ? 'active' : '' ?>">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?sec=registro" class="nav-link <?= ($seccion == 'registro') ? 'active' : '' ?>">Registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>
</header>