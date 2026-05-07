<?php
require_once "classes/Producto.php";

$json_crudo = file_get_contents("data/productos.json");
$productos_raw = json_decode($json_crudo);

$catalogo = [];
foreach ($productos_raw as $p) {
    $item = new Producto();
    $item->id = $p->id;
    $item->nombre = $p->nombre;
    $item->descripcion = $p->descripcion;
    $item->precio = $p->precio;
    $item->categoria = $p->categoria;
    $item->imagen = $p->imagen;
    $item->fecha_fabricacion = $p->fecha_fabricacion;
    $item->descripcion_detallada = $p->descripcion_detallada;
    $catalogo[] = $item;
}

$secciones_validas = ["home", "catalogo", "detalle", "contacto", "alumno","procesar_contacto","reservar", "procesar_reserva" ];
$seccion = isset($_GET['sec']) ? $_GET['sec'] : "home";

if (!in_array($seccion, $secciones_validas)) {
    $seccion = "404";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CyberLife <?= ucfirst($seccion); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header class="bg-white border-bottom py-4">
    <div class="container text-center">
        <a href="index.php?sec=home">
            <img src="img/assets/logo.png" alt="CyberLife Logo" class="logo-header">
        </a>

        <nav class="mt-4">
            <ul>
                <li>
                    <a href="index.php?sec=home" class="<?= $seccion == 'home' ? 'active' : '' ?>">Inicio</a>
                </li>
                <li>
                    <a href="index.php?sec=catalogo" class="<?= ($seccion == 'catalogo' && !isset($_GET['cat'])) ? 'active' : '' ?>">Todos los Androides</a>
                </li>
                <li>
                    <a href="index.php?sec=catalogo&cat=Hogar" class="<?= (isset($_GET['cat']) && $_GET['cat'] == 'Hogar') ? 'active' : '' ?>">Serie Hogar</a>
                </li>
                <li>
                    <a href="index.php?sec=catalogo&cat=Trabajo" class="<?= (isset($_GET['cat']) && $_GET['cat'] == 'Trabajo') ? 'active' : '' ?>">Serie Trabajo</a>
                </li>
                <li>
                    <a href="index.php?sec=catalogo&cat=Defensa" class="<?= (isset($_GET['cat']) && $_GET['cat'] == 'Defensa') ? 'active' : '' ?>">Serie Defensa</a>
                </li>
                <li>
                    <a href="index.php?sec=contacto" class="<?= $seccion == 'contacto' ? 'active' : '' ?>">Contacto</a>
                </li>
                <li>
                    <a href="index.php?sec=alumno" class="<?= $seccion == 'alumno' ? 'active' : '' ?>">El Programador</a>
                </li>
            </ul>
        </nav>
    </div>
    </header>

    <main>
        <?php
            $vista_a_cargar = "views/$seccion.php";
            if (file_exists($vista_a_cargar)) {
                include_once $vista_a_cargar;
            } else {
                echo "<h2>404: No encontramos ese sector de la fábrica</h2>";
            }
        ?>
    </main>

    <footer class="bg-white border-top py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <img src="img/assets/logo.png" alt="CyberLife" style="max-width: 150px;" class="mb-3">
                <p class="text-muted small">Líderes en tecnología biónica. Diseñando el futuro de la comodidad humana.</p>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="h6 fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">Navegación</h4>
                <ul class="list-unstyled">
                    <li><a href="index.php?sec=home" class="footer-link">Inicio</a></li>
                    <li><a href="index.php?sec=catalogo" class="footer-link">Catálogo</a></li>
                    <li><a href="index.php?sec=contacto" class="footer-link">Soporte Técnico</a></li>
                    <li><a href="index.php?sec=alumno" class="footer-link">El Programador</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h4 class="h6 fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">Institucional</h4>
                <p class="text-muted small mb-1">Escuela Da Vinci</p>
                <p class="text-muted small mb-1">Programación II - 1er Parcial</p>
                <p class="text-muted small">Profesor: Alejandro D'Addezio</p>
            </div>
        </div>

        <div class="row mt-4 pt-4 border-top">
            <div class="col text-center">
                <p class="text-muted" style="font-size: 0.75rem;">&copy; 2026 CyberLife Argentina. La obediencia es nuestra prioridad.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>