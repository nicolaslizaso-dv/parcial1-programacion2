<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}
$id = $_GET['id'] ?? null;
$categoria = $id ? Categoria::categoria_x_id($id) : null;
if (!$categoria) { header("Location: index.php?sec=panel_categorias"); exit(); }
?>
<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-5 shadow-sm border">
            <h2 class="h4 fw-light mb-4 text-center text-uppercase">Editar Serie</h2>
            <form action="index.php?sec=procesar_edicion_categoria" method="POST">
                <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-uppercase">Nuevo Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $categoria->getNombre() ?>" required>
                </div>
                <div class="text-center">
                    <a href="index.php?sec=panel_categorias" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-warning fw-bold">Actualizar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>