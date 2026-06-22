<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}
$catalogo = Producto::catalogo_completo();
?>
<div class="container py-5 fade-in-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-light text-uppercase">Panel de Control: Unidades</h2>
        <div>
        <a href="index.php?sec=panel_categorias" class="btn btn-outline-secondary fw-bold me-2">Ver Categorías</a>
        <a href="index.php?sec=form_alta" class="btn btn-primary fw-bold">+ Cargar Producto</a>
        </div>
    </div>

    <div class="table-responsive bg-white shadow-sm border p-3">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Serie</th>
                    <th>Precio</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($catalogo as $robot): ?>
                    <tr>
                        <td><img src="img/productos/<?= $robot->getImagen() ?>" alt="<?= $robot->getNombre() ?>" width="50" class="img-thumbnail"></td>
                        <td class="fw-bold"><?= $robot->getNombre() ?></td>
                        <td><?= $robot->getCategoria() ?></td>
                        <td><?= $robot->precio_formateado() ?></td>
                        <td class="text-center">
                            <a href="index.php?sec=form_edicion&id=<?= $robot->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?sec=procesar_baja&id=<?= $robot->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que querés eliminar esta unidad? Esta acción no se puede deshacer.');">Borrar</a>   
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>