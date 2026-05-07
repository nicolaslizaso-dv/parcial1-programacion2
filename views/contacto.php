<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="contact-header text-center mb-5">
                <h2 class="fw-light text-uppercase" style="letter-spacing: 3px;">Soporte Técnico</h2>
                <p class="text-muted small">Reporte de diagnóstico para unidades de la serie HG, TR y DF.</p>
            </div>

            <form action="index.php?sec=procesar_contacto" method="POST" class="cyber-form">
                <div class="mb-4">
                    <label for="nombre" class="form-label small text-uppercase fw-bold">Nombre del Propietario</label>
                    <input type="text" name="nombre" id="nombre" class="form-control-cyber" placeholder="Ej: Nicolas Lizaso" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label small text-uppercase fw-bold">Email de Red</label>
                    <input type="email" name="email" id="email" class="form-control-cyber" placeholder="nombre@dominio.com" required>
                </div>

                <div class="mb-4">
                    <label for="modelo" class="form-label small text-uppercase fw-bold">Serie de la Unidad</label>
                    <select name="modelo" id="modelo" class="form-select-cyber">
                        <option value="Serie HG">Serie HG (Asistencia Doméstica)</option>
                        <option value="Serie TR">Serie TR (Servicios Industriales)</option>
                        <option value="Serie DF">Serie DF (Sistemas de Seguridad)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="mensaje" class="form-label small text-uppercase fw-bold">Descripción de la Anomalía</label>
                    <textarea name="mensaje" id="mensaje" rows="4" class="form-control-cyber" placeholder="Describa el comportamiento del androide..." required></textarea>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn-cyber-submit">ENVIAR REPORTE</button>
                </div>
            </form>
        </div>
    </div>
</div>