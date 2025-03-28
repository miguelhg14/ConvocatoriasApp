<div class="container py-4">
        <div class="card shadow-lg">
            <div class="card-header bg-success bg-opacity-75 d-flex justify-content-between align-items-center">
                <div >
                    <h2 class="card-title mb-1 ">Requisitos</h2>
                    <p class="card-text text-muted">Gestión de documentos y requisitos necesarios</p>
                </div>
                <span class="badge bg-success bg-opacity-75">Progreso: 0%</span>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="requisitosTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="impulsa-tab" data-bs-toggle="tab" data-bs-target="#impulsa" type="button" role="tab">Impulsa</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mini-ciencias-tab" data-bs-toggle="tab" data-bs-target="#mini-ciencias" type="button" role="tab">Mini Ciencias</button>
                    </li>
                </ul>

                <div class="tab-content" id="requisitosTabContent">
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="accordion" id="accordionGeneral">
                            <!-- Administrativos Section -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingAdministrativos">
                                    <button class="accordion-button bg-success bg-opacity-10 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdministrativos">
                                        Administrativos
                                    </button>
                                </h2>
                                <div id="collapseAdministrativos" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="datos-representante">
                                            <label class="form-check-label" for="datos-representante">
                                                Datos completos del representante
                                                <small class="d-block text-muted">Nombre completo, teléfono, correo electrónico y dirección</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="fotocopia">
                                            <label class="form-check-label" for="fotocopia">
                                                Fotocopia
                                                <small class="d-block text-muted">Fotocopia legible de documentos de identidad</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="identificacion">
                                            <label class="form-check-label" for="identificacion">
                                                Identificación oficial
                                                <small class="d-block text-muted">Copia de identificación oficial vigente</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="comprobante-domicilio">
                                            <label class="form-check-label" for="comprobante-domicilio">
                                                Comprobante de domicilio
                                                <small class="d-block text-muted">No mayor a 3 meses de antigüedad</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Documentacion Section -->
                            <div class="accordion-item mt-3">
                                <h2 class="accordion-header" id="headingDocumentacion">
                                    <button class="accordion-button bg-success bg-opacity-10 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDocumentacion">
                                        Documentación
                                    </button>
                                </h2>
                                <div id="collapseDocumentacion" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="formulario-registro">
                                            <label class="form-check-label" for="formulario-registro">
                                                Formulario de registro
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="carta-compromiso">
                                            <label class="form-check-label" for="carta-compromiso">
                                                Carta compromiso
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="curriculum-vitae">
                                            <label class="form-check-label" for="curriculum-vitae">
                                                Curriculum Vitae
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Financieros Section -->
                            <div class="accordion-item mt-3">
                                <h2 class="accordion-header" id="headingFinancieros">
                                    <button class="accordion-button bg-success bg-opacity-10 text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFinancieros">
                                        Financieros
                                    </button>
                                </h2>
                                <div id="collapseFinancieros" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="comprobante-pago">
                                            <label class="form-check-label" for="comprobante-pago">
                                                Comprobante de pago
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="estado-cuenta">
                                            <label class="form-check-label" for="estado-cuenta">
                                                Estado de cuenta
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="impulsa" role="tabpanel">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Requisitos específicos para Impulsa</h5>
                                <p class="card-text text-muted">Esta sección contendría los requisitos específicos para el programa Impulsa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="mini-ciencias" role="tabpanel">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Requisitos específicos para Mini Ciencias</h5>
                                <p class="card-text text-muted">Esta sección contendría los requisitos específicos para el programa Mini Ciencias.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between bg-light">
                <button class="btn btn-outline-secondary">Cancelar</button>
                <button class="btn btn-success bg-opacity-75">Guardar</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Basic progress calculation (simplified)
        function calculateProgress() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const totalCheckboxes = checkboxes.length;
            const checkedCheckboxes = Array.from(checkboxes).filter(cb => cb.checked).length;
            const progress = Math.round((checkedCheckboxes / totalCheckboxes) * 100);
            
            document.querySelector('.badge').textContent = `Progreso: ${progress}%`;
        }

        // Add event listeners to checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', calculateProgress);
        });
    </script>