<div class="header">
    <div class="main-container">
        <div class="form-header">
            Crear Convocatoria
        </div>

        <div class="nav-buttons">
            <a href="/convocatoria/lista" class="nav-btn">Ver todas las convocatorias</a>

        </div>

        <?php if (isset($error)): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="/convocatoria/init" method="post" enctype="multipart/form-data" class="convocatoria-form">
            <!-- Debug information -->


            <div class="form-group">
                <label for="nombre">Nombre de la Convocatoria</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" placeholder="Breve Explicación..." required></textarea>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="idInteres" required>
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

            <div class="form-group date-inputs">
                <div class="date-input">
                    <label for="fecha-inicio">Fecha de Inicio</label>
                    <div class="date-wrapper">
                        <input type="date" id="fecha-inicio" name="fecha_inicio" required>
                    </div>
                </div>

                <div class="date-input">
                    <label for="fecha-cierre">Fecha de Cierre</label>
                    <div style="position: relative;">
                        <input type="date" id="fecha-cierre" name="fecha_cierre" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="modalidad">Modalidad</label>
                <select id="modalidad" name="modalidad" required>
                    <option value="" selected disabled>Seleccione una modalidad</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Mixta">Mixta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación <span class="small-text">(Solo se debe seleccionar si tipo de modalidad es presencial o mixta)</span></label>
                <input type="text" id="ubicacion" name="ubicacion" placeholder="Seleccione una ciudad">
            </div>

            <div class="form-group">
                <label for="requisitos">Requisitos</label>
                <textarea id="requisitos" name="requisitos" placeholder="Ejemplo: Mayor de 18 años..." required></textarea>
            </div>

            <div class="form-group">
                <label for="beneficios">Beneficios</label>
                <textarea id="beneficios" name="beneficios" placeholder="Ejemplo: Acceso a certificación gratuita" required></textarea>
            </div>

            <div class="form-group">
                <label for="enlace">Enlace de Inscripción (Opcional)</label>
                <input type="url" id="enlace" name="enlace_inscripcion" placeholder="https://ejemplo.com/inscripcion">
            </div>

            <div class="form-group">
                <label for="imagen">Imagen de la convocatoria (Opcional)</label>
                <div class="file-upload">
                    <div class="upload-icon">⇧</div>
                    <p>Haz clic para subir una imagen (opcional)</p>
                    <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage(this);">
                    <img id="imagen-preview" src="#" alt="Vista previa de la imagen">
                </div>
            </div>

            <button type="submit" class="submit-button">Publicar Convocatoria</button>
        </form>
    </div>
    </body>

    </html>