<?php
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$robot_nombre = $_POST['robot_nombre'] ?? '';
$precio = $_POST['precio_total'] ?? '';
$fecha_hoy = date('d/m/Y H:i');
?>

<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="bg-white border p-5 shadow-sm position-relative overflow-hidden">

                <div class="text-center mb-5">
                    <h2 class="h4 text-uppercase fw-bold text-primary">Reserva Confirmada</h2>
                    <p class="text-muted small">ID de Transacción: #CL-<?= rand(1000, 9999) ?></p>
                </div>

                <div class="mb-4">
                    <h3 class="h6 text-uppercase fw-bold border-bottom pb-2">Datos del Cliente</h3>
                    <p class="mb-1"><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
                    <p class="mb-1"><strong>Entrega en:</strong> <?= htmlspecialchars($direccion) ?></p>
                </div>

                <div class="mb-4">
                    <h3 class="h6 text-uppercase fw-bold border-bottom pb-2">Detalle de la Unidad</h3>
                    <p class="mb-1"><strong>Modelo:</strong> <?= $robot_nombre ?></p>
                    <p class="mb-1"><strong>Fecha de Solicitud:</strong> <?= $fecha_hoy ?></p>
                </div>

                <div class="bg-light p-4 text-center mt-5 border-dashed border">
                    <p class="mb-1 small text-muted">Total a abonar en domicilio:</p>
                    <h2 class="h3 fw-bold mb-0 text-dark"><?= $precio ?></h2>
                </div>

                <div class="text-center mt-5">
                    <p class="small text-muted">Gracias por confiar en el futuro. Gracias por elegir <strong>CyberLife</strong>.</p>
                    <a href="index.php?sec=home" class="btn btn-outline-primary btn-sm mt-3">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>