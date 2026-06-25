<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}
?>
<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-5 shadow-sm border">
            <h2 class="h4 fw-light mb-4 text-center text-uppercase">Alta de Serie</h2>
            <form action="actions/procesar_alta_categoria.php" method="POST">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-uppercase">Nombre de la Serie</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="text-center">
                    <a href="index.php?sec=panel_categorias" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary fw-bold">Guardar Serie</button>
                </div>
            </form>
        </div>
    </div>
</div>