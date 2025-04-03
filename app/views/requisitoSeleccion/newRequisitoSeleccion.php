<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center p-4">
                    <h2 class="h3 mb-3"><i class="fas fa-tasks me-2"></i>Requisito de Selección</h2>
                </div>
                <div class="card-body">
                    <form action="/requisitoSeleccion/create" method="post">
                        <!-- Campo de Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
                        </div>

                        <!-- Campo de Tipo (Select) -->
                        <div class="mb-4">
                            <label for="idTipo" class="form-label fw-bold">Tipo</label>
                            <select class="form-select form-select-lg" id="idTipo" name="idTipo" required>
                                <option value="">Seleccione un tipo</option>
                                <?php if(isset($tipos) && is_array($tipos)): ?>
                                    <?php foreach($tipos as $tipo): ?>
                                        <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg py-3">
                                <i class="fas fa-save me-2"></i>Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>