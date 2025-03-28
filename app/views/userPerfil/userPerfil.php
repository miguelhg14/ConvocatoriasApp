
    <div class="container my-2">
        <div class="card shadow-sm">
        <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-9">
            <div class="card-header bg-success bg-gradient text-white text-center py-4 position-relative">
                <button class="btn btn-light btn-sm rounded-circle position-absolute top-0 end-0 m-3">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                
                <div class="mx-auto mb-3" style="width: 120px; height: 120px;">
                    <img id="profileImage" src="/api/placeholder/120/120" alt="Profile" class="img-fluid rounded-circle border border-4 border-white w-100 h-100 object-fit-cover">
                    <input type="file" id="fileInput" accept="image/*" class="d-none">
                </div>
                
                <h3 class="mb-3"><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h3>
                
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge bg-warning text-dark rounded-pill"><i class="fas fa-laptop-code me-1"></i> Ingeniero en sistemas</span>
                    <span class="badge bg-purple text-white rounded-pill"><i class="fas fa-project-diagram me-1"></i> Gestión de Proyectos</span>
                    <span class="badge bg-primary text-white rounded-pill"><i class="fas fa-code me-1"></i> Desarrollo Frontend</span>
                    <span class="badge bg-pink text-white rounded-pill"><i class="fas fa-cogs me-1"></i> Ingeniero de Software</span>
                    <span class="badge bg-orange text-white rounded-pill"><i class="fas fa-server me-1"></i> Desarrollo Backend</span>
                    <span class="badge bg-success text-white rounded-pill"><i class="fas fa-industry me-1"></i> Industrial Engineering</span>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="user-details">
                    <h4 class="d-flex align-items-center mb-4 pb-2 border-bottom">
                        <i class="fas fa-user-circle text-success me-2"></i> Datos del usuario / Empresa
                    </h4>
                    
                    <form action="userPerfil/init" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">
                                <i class="fas fa-user me-1"></i> Nombre:
                            </label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="telefono" class="form-label">
                                <i class="fas fa-signature me-1"></i> Apellido:
                            </label>
                            <input type="tel" class="form-control" name="telefono" id="telefono" value="<?php echo $_SESSION['apellido']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label">
                                <i class="fas fa-envelope me-1"></i> Correo Electrónico:
                            </label>
                            <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $_SESSION['correo']; ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mt-3">
                            <i class="fas fa-save me-2"></i> Guardar
                        </button>
                        <a href="/requisitos/init" class="btn btn-success bg-opacity-75"><i class="fas fa-file-contract me-2"></i>Requisitos</a>
                    </form>
                </div>
            </div>
        </div>
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
    
    <style>
        /* Solo clases para colores que no existen en Bootstrap */
        .bg-purple { background-color: #9C27B0; }
        .bg-pink { background-color: #E91E63; }
        .bg-orange { background-color: #FF5722; }
        .object-fit-cover { object-fit: cover; }
    </style>
</body>
</html>