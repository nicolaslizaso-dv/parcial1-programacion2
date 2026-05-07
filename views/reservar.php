<?php
$id_reserva = $_GET['id'] ?? null;
$robot = null;

foreach ($catalogo as $r) {
    if ($r->id == $id_reserva) {
        $robot = $r;
        break;
    }
}

if (!$robot):
    echo "<div class='container py-5 text-center'><h2>Unidad no encontrada</h2></div>";
else:
?>
<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-5 shadow-sm border">
            <h2 class="h3 fw-light mb-4">Finalizar Reserva: <span class="fw-bold"><?= $robot->nombre ?></span></h2>
            
            <form action="index.php?sec=procesar_reserva" method="POST" class="row g-3">
                <input type="hidden" name="robot_nombre" value="<?= $robot->nombre ?>">
                <input type="hidden" name="precio_total" value="<?= $robot->precio_formateado() ?>">

                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control rounded-0" required placeholder="Ej: Juan Pérez">
                </div>
                
                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Email de Contacto</label>
                    <input type="email" name="email" class="form-control rounded-0" required placeholder="nombre@mail.com">
                </div>

                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Dirección de Entrega</label>
                    <input type="text" name="direccion" class="form-control rounded-0" required placeholder="Calle, Número, Ciudad">
                </div>

                <div class="col-12 bg-light p-3 mt-4 border-start border-primary border-4">
                    <p class="mb-1 small text-muted">Monto total a pagar:</p>
                    <h4 class="mb-0 fw-bold"><?= $robot->precio_formateado() ?></h4>
                    <p class="mb-0 text-primary small fw-bold">* Pago al momento de la entrega</p>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary w-100 py-3 text-uppercase fw-bold">Confirmar Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>