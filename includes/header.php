<?php
// Traemos todas las categorías (Series) directo de la base de datos
$categorias_header = Categoria::lista_completa();
?>
<header class="bg-white border-bottom position-sticky top-0 shadow-sm" style="z-index: 1000;">
    <nav class="navbar navbar-expand-lg navbar-light container py-3">
        <a class="navbar-brand" href="index.php?sec=home">
            <img src="img/assets/logo.png" alt="CyberLife Logo" class="logo-header" style="max-width: 180px;">
        </a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="menuPrincipal">
            
            <ul class="navbar-nav gap-lg-3 text-center mt-4 mt-lg-0 mx-auto fw-semibold">
                <li class="nav-item">
                    <a href="index.php?sec=home" class="nav-link <?= ($seccion == 'home') ? 'active text-primary fw-bold' : '' ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?sec=catalogo" class="nav-link <?= ($seccion == 'catalogo' && !isset($_GET['cat'])) ? 'active text-primary fw-bold' : '' ?>">Todos los androides</a>
                </li>
                
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle <?= (isset($_GET['cat'])) ? 'active text-primary fw-bold' : '' ?>" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                        Series
                    </a>
                    <ul class="dropdown-menu border-0 shadow mt-0 rounded-3" aria-labelledby="navbarDropdown">
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
                    <a href="index.php?sec=contacto" class="nav-link <?= ($seccion == 'contacto') ? 'active text-primary fw-bold' : '' ?>">Contacto</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?sec=alumno" class="nav-link <?= ($seccion == 'alumno') ? 'active text-primary fw-bold' : '' ?>">El Programador</a>
                </li>
            </ul>

            <ul class="navbar-nav gap-3 text-center mt-4 mt-lg-0 align-items-center">
                <?php if(isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item me-2">
                        <span class="text-muted small fw-bold text-uppercase d-block mb-2 mb-lg-0">Hola, <?= $_SESSION['usuario_nombre'] ?></span>
                    </li>
                    
                    <?php if($_SESSION['usuario_rol'] == 'admin'): ?>
                        <li class="nav-item">
                            <a href="admin/index.php" class="btn btn-dark px-4 rounded-pill fw-bold shadow-sm">Panel de Control</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?sec=carrito" class="btn btn-outline-primary px-4 rounded-pill fw-bold shadow-sm">🛒 Mi Carrito</a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a href="index.php?sec=logout" class="btn btn-danger px-4 rounded-pill fw-bold shadow-sm">Salir</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php?sec=login" class="btn text-primary px-4 rounded-pill fw-bold border border-primary shadow-sm btn-hover-outline" style="transition: all 0.3s;">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?sec=registro" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm btn-hover-solid" style="transition: all 0.3s;">Registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>
</header>
