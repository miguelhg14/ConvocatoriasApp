
    <div class="header">
        <div class="logo">♣</div>
        <div class="user-info">
            <span class="user-icon">⚪</span>
            <span class="user-icon"><?php echo $_SESSION['nombre']?></span>
            <button action="/logout">Cerrar Sesion</button>
        </div>
    </div>
    
    <div class="main-container">
        <div class="form-header">
            Crear Convocatoria
        </div>
        
        <?php if(isset($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        
        <form action="/convocatoria/init" method="post" enctype="multipart/form-data">
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
                <select id="categoria" name="categoria" required>
                    <option value="" selected disabled>Seleccione una categoría</option>
                </select>
            </div>
            
            <div class="form-group date-inputs">
                <div class="date-input">
                    <label for="fecha-inicio">Fecha de Inicio</label>
                    <div style="position: relative;">
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
                <label for="imagen">Imagen de la convocatoria</label>
                <div class="file-upload">
                    <div class="upload-icon">⇧</div>
                    <p>Haz clic para subir una imagen</p>
                    <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage(this);">
                    <img id="imagen-preview" src="#" alt="Vista previa de la imagen">
                </div>
            </div>
            
            <button type="submit" class="submit-button">Publicar Convocatoria</button>
        </form>
    </div>
    
    <script>
        function previewImage(input) {
            var preview = document.getElementById('imagen-preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }
        
        // Asegurar que las fechas tengan un orden lógico
        document.getElementById('fecha-cierre').addEventListener('change', function() {
            var fechaInicio = document.getElementById('fecha-inicio').value;
            var fechaCierre = this.value;
            
            if (fechaInicio && fechaCierre && fechaCierre < fechaInicio) {
                alert('La fecha de cierre no puede ser anterior a la fecha de inicio');
                this.value = '';
            }
        });
        
        // Mostrar/ocultar campo de ubicación según modalidad
        document.getElementById('modalidad').addEventListener('change', function() {
            var modalidad = this.options[this.selectedIndex].text.toLowerCase();
            var ubicacionField = document.getElementById('ubicacion');
            
            if (modalidad.includes('presencial') || modalidad.includes('mixta')) {
                ubicacionField.required = true;
                ubicacionField.parentElement.style.display = 'block';
            } else {
                ubicacionField.required = false;
                ubicacionField.value = '';
                ubicacionField.parentElement.style.display = 'none';
            }
        });
    </script>
</body>
</html>