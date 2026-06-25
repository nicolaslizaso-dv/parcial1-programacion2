<?php
$id_reserva = $_GET['id'] ?? null;
$robot = Producto::producto_x_id($id_reserva);

if (!$robot):
    echo "<div class='container py-5 text-center'><h2>Unidad no encontrada</h2><a href='index.php?sec=catalogo' class='btn btn-marca'>Volver</a></div>";
else:
?>
<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-5 shadow-sm border">
            <h2 class="h3 fw-light mb-4 text-center text-uppercase">Finalizar Reserva</h2>
            <p class="text-center mb-5">Unidad seleccionada: <strong><?= $robot->getNombre() ?></strong></p>
            <form action="index.php?sec=procesar_reserva" method="POST" class="row g-3">
                <input type="hidden" name="robot_nombre" value="<?= $robot->getNombre() ?>">
                <input type="hidden" name="precio_total" value="<?= $robot->precio_formateado() ?>">
                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control rounded-0" required>
                </div>
                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Email de Contacto</label>
                    <input type="email" name="email" class="form-control rounded-0" required>
                </div>
                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Dirección de Entrega</label>
                    <input type="text" name="direccion" class="form-control rounded-0" required>
                </div>
                <div class="col-12 bg-light p-3 mt-4 border-start border-marca border-4 text-center">
                    <p class="mb-1 small text-muted">Monto total a abonar:</p>
                    <h4 class="mb-0 fw-bold"><?= $robot->precio_formateado() ?></h4>
                    <p class="mb-0 text-marca small fw-bold">* Pago al momento de la entrega</p>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-marca w-100 py-3 text-uppercase fw-bold">Confirmar Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>