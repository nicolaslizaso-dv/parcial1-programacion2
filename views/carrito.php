<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'cliente') {
    header("Location: index.php?sec=login");
    exit();
}

$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
$productos_en_carrito = [];

foreach ($carrito as $id) {
    $robot = Producto::producto_x_id($id);
    if ($robot) {
        $productos_en_carrito[] = $robot;
        $total += $robot->getPrecio();
    }
}
?>
<div class="container py-5 fade-in-up">
    <h2 class="display-6 fw-light mb-4 text-uppercase">Mi Carrito de Compras</h2>

    <?php if (empty($productos_en_carrito)): ?>
        <div class="alert alert-info text-center py-5">
            <p class="mb-3">Tu carrito está vacío. ¡Explorá nuestro catálogo y encontrá tu androide ideal!</p>
            <a href="index.php?sec=catalogo" class="btn btn-marca">Ir al Catálogo</a>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-8">
                <div class="bg-white border shadow-sm p-3 mb-4">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Unidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos_en_carrito as $item): ?>
                                <tr>
                                    <td>
                                        <img src="img/productos/<?= $item->getImagen() ?>" width="50" class="img-thumbnail me-2">
                                        <span class="fw-bold"><?= $item->getNombre() ?></span>
                                    </td>
                                    <td class="fw-bold text-marca"><?= $item->precio_formateado() ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-end mt-3">
                        <a href="index.php?sec=vaciar_carrito" class="btn btn-sm btn-outline-danger">Vaciar Carrito</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="bg-white border shadow-sm p-4">
                    <h4 class="h5 border-bottom pb-3 mb-3">Resumen de Compra</h4>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Total a pagar:</span>
                        <span class="fw-bold fs-4 text-marca">$<?= number_format($total, 2, ',', '.') ?></span>
                    </div>
                    <a href="index.php?sec=procesar_compra" class="btn btn-marca w-100 py-3 fw-bold text-uppercase">Confirmar Compra</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>