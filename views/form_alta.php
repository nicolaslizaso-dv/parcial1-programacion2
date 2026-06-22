<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}
?>
<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-5 shadow-sm border">
            <h2 class="h4 fw-light mb-4 text-center text-uppercase">Alta de Nueva Unidad</h2>
            
            <form action="index.php?sec=procesar_alta" method="POST" enctype="multipart/form-data" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Nombre del Androide</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Precio ($)</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Serie (Categoría)</label>
                    <select name="serie_id" class="form-select" required>
                        <option value="1">Hogar</option>
                        <option value="2">Trabajo</option>
                        <option value="3">Defensa</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Fecha de Fabricación</label>
                    <input type="date" name="fecha_fabricacion" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Foto del Androide (Catálogo)</label>
                    <input type="file" name="imagen" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-uppercase">Foto del Androide (Detalle)</label>
                    <input type="file" name="imagen_2" class="form-control" accept="image/*" required>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold text-uppercase">Descripción Corta</label>
                    <input type="text" name="descripcion" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold text-uppercase">Descripción Detallada</label>
                    <textarea name="descripcion_detallada" class="form-control" rows="4" required></textarea>
                </div>
                <div class="col-12 text-center mt-4">
                    <a href="index.php?sec=panel_admin" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary fw-bold">Guardar Androide</button>
                </div>
            </form>
        </div>
    </div>
</div>