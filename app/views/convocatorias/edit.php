<div class="header">
    <div class="main-container">
        <div class="form-header">
            Editar Convocatoria
        </div>

        <form action="/convocatoria/update/<?php echo htmlspecialchars($convocatoria['id']); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($convocatoria['id']); ?>">
            
            <div class="form-group">
                <label for="nombre">Nombre de la Convocatoria</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($convocatoria['nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($convocatoria['descripcion']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="idInteres" required>
                    <?php foreach ($intereses as $interes): ?>
                        <option value="<?php echo $interes->id; ?>" <?php echo ($interes->id == $convocatoria['idInteres']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($interes->nombre); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group date-inputs">
                <div class="date-input">
                    <label for="fecha-inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha-inicio" name="fecha_inicio" 
                           value="<?php echo htmlspecialchars($convocatoria['fechaInicio'] ?? ''); ?>" required>
                </div>

                <div class="date-input">
                    <label for="fecha-cierre">Fecha de Cierre</label>
                    <input type="date" id="fecha-cierre" name="fecha_fin" 
                           value="<?php echo htmlspecialchars($convocatoria['fechaFin'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="modalidad">Modalidad</label>
                <select id="modalidad" name="modalidad" required>
                    <option value="Virtual" <?php echo ($convocatoria['modalidad'] == 'Virtual') ? 'selected' : ''; ?>>Virtual</option>
                    <option value="Presencial" <?php echo ($convocatoria['modalidad'] == 'Presencial') ? 'selected' : ''; ?>>Presencial</option>
                    <option value="Mixta" <?php echo ($convocatoria['modalidad'] == 'Mixta') ? 'selected' : ''; ?>>Mixta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($convocatoria['ubicacion']); ?>">
            </div>

            <div class="form-group">
                <label for="requisitos">Requisitos</label>
                <textarea id="requisitos" name="requisitos" required><?php echo htmlspecialchars($convocatoria['requisitos']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="beneficios">Beneficios</label>
                <textarea id="beneficios" name="beneficios" required><?php echo htmlspecialchars($convocatoria['beneficios']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="enlace">Enlace de Inscripción</label>
                <input type="url" id="enlace" name="enlace_inscripcion" 
                       value="<?php echo htmlspecialchars($convocatoria['enlaceInscripcion'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="imagen">Imagen de la convocatoria</label>
                <div class="file-input-container">
                    <input type="file" id="imagen" name="imagen" accept="image/*" class="file-input">
                    <?php if (!empty($convocatoria['imagen'])): ?>
                        <p class="current-image">Imagen actual: <?php echo htmlspecialchars($convocatoria['imagen']); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <style>
            .file-input-container {
                position: relative;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                background: #f9f9f9;
            }
            .file-input {
                display: block;
                width: auto;
                margin: 10px 0;
            }
            .current-image {
                margin-top: 5px;
                font-size: 0.9em;
                color: #666;
            }
            </style>
            <button type="submit" class="submit-button">Actualizar Convocatoria</button>
        </form>
    </div>
</div>