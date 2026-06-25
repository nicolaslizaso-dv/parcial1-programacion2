<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-5 bg-white p-5 shadow-sm border">
            <h2 class="h3 fw-light mb-4 text-center text-uppercase">Acceso Autorizado</h2>
            
            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger small text-center fw-bold">Credenciales incorrectas. Verifique y reintente.</div>
            <?php endif; ?>

            <form action="index.php?sec=procesar_login" method="POST" class="row g-3">
                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Email</label>
                    <input type="email" name="email" class="form-control rounded-0" required>
                </div>
                <div class="col-12">
                    <label class="form-label text-uppercase small fw-bold">Contraseña</label>
                    <input type="password" name="password" class="form-control rounded-0" required>
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-marca w-100 py-3 text-uppercase fw-bold">Ingresar</button>
                </div>
                <div class="col-12 text-center mt-3">
                    <a href="index.php?sec=registro" class="small text-muted text-decoration-none">¿Todavía no tienes cuenta? Regístrate acá</a>
                </div>
            </form>
        </div>
    </div>
</div>