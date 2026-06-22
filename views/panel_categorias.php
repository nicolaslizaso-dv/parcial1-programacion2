<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: index.php?sec=home");
    exit();
}

$lista = Categoria::lista_completa();
?>
<div class="container py-5 fade-in-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-light text-uppercase">Panel: Series / Categorías</h2>
        <div>
            <a href="index.php?sec=panel_admin" class="btn btn-outline-secondary fw-bold me-2">Ver Unidades</a>
            <a href="index.php?sec=form_alta_categoria" class="btn btn-primary fw-bold">+ Nueva Serie</a>
        </div>
    </div>

    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-danger fw-bold">No se puede borrar esta Serie porque todavía hay androides asignados a ella. Primero cambiales la categoría o eliminalos.</div>
    <?php endif; ?>

    <div class="table-responsive bg-white shadow-sm border p-3">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre de la Serie</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $cat): ?>
                    <tr>
                        <td class="fw-bold"><?= $cat->getId() ?></td>
                        <td><?= $cat->getNombre() ?></td>
                        <td class="text-center">
                            <a href="index.php?sec=form_edicion_categoria&id=<?= $cat->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?sec=procesar_baja_categoria&id=<?= $cat->getId() ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta Serie?');">Borrar</a>   
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>