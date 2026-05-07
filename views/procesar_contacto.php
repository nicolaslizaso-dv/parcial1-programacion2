<?php
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "Anónimo";
$email = $_POST['email'] ?? "No proveído";
$modelo = $_POST['modelo'] ?? "Desconocido";
$mensaje = $_POST['mensaje'] ?? "Sin mensaje";

?>

<div class="container py-5 text-center fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6 border p-5 bg-white shadow-sm">
            <h2 class="h4 fw-light mb-4 text-uppercase" style="letter-spacing: 2px;">Reporte Registrado</h2>
            <p class="text-muted mb-5">Se ha generado un ticket de diagnóstico con los siguientes parámetros:</p>
            
            <div class="text-start mb-5" style="border-left: 3px solid #00b4ff; padding-left: 20px;">
                <p class="mb-1 text-uppercase small fw-bold text-muted">Solicitante</p>
                <p class="mb-3"><?= htmlspecialchars($nombre); ?></p>

                <p class="mb-1 text-uppercase small fw-bold text-muted">Unidad Afectada</p>
                <p class="mb-3"><?= htmlspecialchars($modelo); ?></p>

                <p class="mb-1 text-uppercase small fw-bold text-muted">Descripción</p>
                <p class="italic">"<?= htmlspecialchars($mensaje); ?>"</p>
            </div>

            <p class="small text-muted mb-4">Un equipo técnico se desplazará a su ubicación en las próximas 2 horas.</p>
            <a href="index.php?sec=home" class="btn-detail">VOLVER AL INICIO</a>
        </div>
    </div>
</div>