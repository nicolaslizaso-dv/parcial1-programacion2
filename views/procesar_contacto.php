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
                <?php foreach ($_POST as $campo => $valor): ?>
                    <p class="mb-1 text-uppercase small fw-bold text-muted"><?= str_replace('_', ' ', $campo) ?></p>
                    <p class="mb-3"><?= htmlspecialchars($valor) ?></p>
                <?php endforeach; ?>
            </div>

            <p class="small text-muted mb-4">Nuestro sistema central procesará su solicitud en breve.</p>
            <a href="index.php?sec=home" class="btn btn-outline-primary btn-sm text-uppercase fw-bold" style="letter-spacing: 1px;">Finalizar Sesión</a>
        </div>
    </div>
</div>