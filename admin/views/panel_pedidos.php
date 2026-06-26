<?php
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: ../index.php?sec=home");
    exit();
}

$pedidos = Pedido::listar_pedidos_completos();
?>
<div class="container py-5 fade-in-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-light text-uppercase">Panel: Pedidos de Clientes</h2>
    </div>

    <?php if (empty($pedidos)): ?>
        <div class="alert alert-info fw-bold">Aún no hay pedidos registrados en el sistema.</div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($pedidos as $pedido): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 8px; overflow: hidden;">
                        
                        <div class="card-header bg-dark text-white fw-bold py-3">
                            <h5 class="mb-0 fs-6">Pedido #<?= $pedido['id'] ?></h5>
                        </div>
                        
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <span class="text-uppercase small fw-bold" style="color: #00b4ff; letter-spacing: 1px;">Cliente</span>
                                <p class="mb-0 text-dark fw-semibold fs-5"><?= $pedido['usuario'] ?></p>
                            </div>
                            
                            <hr class="text-muted">
                            
                            <div class="mb-3">
                                <span class="text-uppercase small fw-bold" style="color: #00b4ff; letter-spacing: 1px;">Unidades Adquiridas</span>
                                <ul class="list-unstyled mt-2 mb-0">
                                    <?php foreach ($pedido['productos'] as $prod): ?>
                                        <li class="small text-muted mb-1">
                                            <span class="fw-bold text-dark"><?= $prod['cantidad'] ?>x</span> <?= $prod['nombre'] ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="card-footer bg-light border-0 p-3 text-end">
                            <span class="text-uppercase small fw-bold text-muted me-2">Total Pagado:</span>
                            <span class="fs-4 fw-bold" style="color: #00b4ff;">$<?= number_format($pedido['total'], 2, ',', '.') ?></span>
                        </div>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>