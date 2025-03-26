<div class="container-fluid py-30">  <!-- Cambiado a container-fluid para más ancho -->
    <div class="row justify-content-center">
        <div class="col-12 col-lg-14 col-xl-10">  <!-- Columnas más anchas -->
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center p-4">
                    <h2 class="h3 mb-3"><i class="fas fa-bullhorn me-2"></i>Convocatorias</h2>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <a href="/convocatoria/lista" class="btn btn-outline-primary">Ver todas las convocatorias</a>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger mb-4">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="/convocatoria/init" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Convocatoria</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Breve Explicación..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select" id="categoria" name="idInteres" required>
                                <option value="" selected disabled>Seleccione una categoría</option>
                                <?php if (isset($intereses) && !empty($intereses)): ?>
                                    <?php foreach ($intereses as $interes): ?>
                                        <option value="<?php echo htmlspecialchars($interes->id); ?>">
                                            <?php echo htmlspecialchars($interes->nombre); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fecha-inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="fecha-inicio" name="fecha_inicio" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fecha-cierre" class="form-label">Fecha de Cierre</label>
                                <input type="date" class="form-control" id="fecha-cierre" name="fecha_cierre" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="modalidad" class="form-label">Modalidad</label>
                            <select class="form-select" id="modalidad" name="modalidad" required>
                                <option value="" selected disabled>Seleccione una modalidad</option>
                                <option value="Virtual">Virtual</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Mixta">Mixta</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación <small class="text-muted">(Solo se debe seleccionar si tipo de modalidad es presencial o mixta)</small></label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Seleccione una ciudad">
                        </div>

                        <div class="mb-3">
                            <label for="requisitos" class="form-label">Requisitos</label>
                            <textarea class="form-control" id="requisitos" name="requisitos" rows="3" placeholder="Ejemplo: Mayor de 18 años..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="beneficios" class="form-label">Beneficios</label>
                            <textarea class="form-control" id="beneficios" name="beneficios" rows="3" placeholder="Ejemplo: Acceso a certificación gratuita" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="enlace" class="form-label">Enlace de Inscripción (Opcional)</label>
                            <input type="url" class="form-control" id="enlace" name="enlace_inscripcion" placeholder="https://ejemplo.com/inscripcion">
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="form-label">Imagen de la convocatoria (Opcional)</label>
                            <div class="border rounded p-3 text-center">
                                <input type="file" class="form-control d-none" id="imagen" name="imagen" accept="image/*" onchange="previewImage(this);">
                                <label for="imagen" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-upload me-2"></i>Haz clic para subir una imagen (opcional)
                                </label>
                                <img id="imagen-preview" src="#" alt="Vista previa de la imagen" class="img-fluid mt-3 d-none">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Publicar Convocatoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>