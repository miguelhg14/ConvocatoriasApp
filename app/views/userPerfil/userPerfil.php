<div class="profile-container">
    <div class="profile-header">
        <div class="edit-button">✏️</div>
        <div class="profile-picture">
            <img id="profileImage" src="/api/placeholder/80/80" alt="Profile">
            <input type="file" id="fileInput" accept="image/*" style="display: none;">
        </div>
        <div class="tags-container">
            <div class="tag tag-yellow">Ingeniero en sistemas</div>
            <div class="tag tag-purple">Gestión de Proyectos</div>
            <div class="tag tag-blue">Desarrollo Frontend</div>
            <div class="tag tag-pink">Ingeniero de Software</div>
            <div class="tag tag-orange">Desarrollo Backend</div>
            <div class="tag tag-green">Industrial Engineering</div>
        </div>
    </div>

    <div class="profile-content">
        <div class="user-details">
            <h3>Datos del usuario / Empresa</h3>
            <form action="perfilUser/init" method="post">
                <div class="detail-item">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="" required>
                </div>
                
                <div class="detail-item">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required></textarea>
                </div>
                
                <div class="detail-item">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" name="correo" id="correo" value="" required>
                </div>
                
                <div class="detail-item">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono" value="" required>
                </div>
                
                <div class="detail-item">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" value="" required>
                </div>
                
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("profileImage").addEventListener("click", function() {
        document.getElementById("fileInput").click();
    });

    document.getElementById("fileInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("profileImage").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

