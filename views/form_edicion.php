<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}

$id = $_GET['id'] ?? null;
$robot = $id ? Producto::producto_x_id($id) : null;

if (!$robot) {
    header("Location: index.php?sec=panel_admin");
    exit();
}
$series = Categoria::lista_completa();

?>
<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-5 shadow-sm border">
            <h2 class="h4 fw-light mb-4 text-center text-uppercase">Modificar Unidad: <?= $robot->getNombre() ?></h2>
            
            <form action="index.php?sec=procesar_edicion" method="POST" enctype="multipart/form-data" class="row g-3">
                <input type="hidden" name="id" value="<?= $robot->getId() ?>">
                <input type="hidden" name="imagen_actual" value="<?= $robot->getImagen() ?>">

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Nombre del Androide</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $robot->getNombre() ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Precio ($)</label>
                    <input type="number" step="0.01" name="precio" class="form-control" value="<?= $robot->getPrecio() ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Serie (Categoría)</label>
                    <select name="serie_id" class="form-select" required>
                        <?php foreach ($series as $serie): ?>
                            <option value="<?= $serie->getId() ?>" <?= ($robot->getSerieId() == $serie->getId()) ? 'selected' : '' ?>>
                                <?= $serie->getNombre() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Fecha de Fabricación</label>
                    <input type="date" name="fecha_fabricacion" class="form-control" value="<?= $robot->getFechaFabricacion() ?>" required>
                </div>
                <div class="col-12">
                    <input type="hidden" name="imagen_actual" value="<?= $robot->getImagen() ?>">
                    <input type="hidden" name="imagen_actual_2" value="<?= $robot->getImagen2() ?>">

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-uppercase">Reemplazar Foto Catálogo</label>
                        <div class="d-flex align-items-center mb-2">
                            <img src="img/productos/<?= $robot->getImagen() ?>" width="50" class="img-thumbnail me-3">
                            <input type="file" name="imagen" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-uppercase">Reemplazar Foto Detalle</label>
                        <div class="d-flex align-items-center mb-2">
                            <img src="img/productos/<?= $robot->getImagen2() ?>" width="50" class="img-thumbnail me-3">
                            <input type="file" name="imagen_2" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold text-uppercase">Descripción Corta</label>
                    <input type="text" name="descripcion" class="form-control" value="<?= $robot->getDescripcion() ?>" required>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold text-uppercase">Descripción Detallada</label>
                    <textarea name="descripcion_detallada" class="form-control" rows="4" required><?= $robot->getDescripcionDetallada() ?></textarea>
                </div>
                <div class="col-12 text-center mt-4">
                    <a href="index.php?sec=panel_admin" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-warning fw-bold">Actualizar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>