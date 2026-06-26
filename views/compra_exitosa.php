<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'cliente') {
    header("Location: index.php?sec=home");
    exit();
}
?>
<div class="container py-5 text-center fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-5 border shadow-sm">
            <h2 class="display-5 text-marca mb-4 text-uppercase fw-bold">¡Compra Confirmada!</h2>
            <p class="lead text-muted mb-4">Tu pedido ha sido confirmado y ya estamos procesándolo.</p>
            <p class="mb-5">Nuestras unidades de distribución ya están procesando el envío a tu ubicación. Recibirás un correo electrónico de CyberLife con los detalles del seguimiento en breve.</p>
            <a href="index.php?sec=catalogo" class="btn btn-marca fw-bold text-uppercase py-3 px-5">Volver al Catálogo</a>
        </div>
    </div>
</div>