<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-2xl">
                <div class="card-header bg-success text-white text-center p-4">
                    <h2 class="h3 mb-3"><i class="fas fa-user-plus me-2"></i>Registrarse</h2>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <div><?php echo $error; ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="/registro/init" method="post">
                        <div class="mb-3">
                            <label for="txtNombre" class="form-label">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="txtNombre" id="txtNombre" required class="form-control" placeholder="Ingresa tu nombre">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="txtCorreo" class="form-label">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="txtCorreo" id="txtCorreo" required class="form-control" placeholder="Ingresa tu Correo">
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="txtTelefono" class="form-label">Telefono</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="txtTelefono" id="txtTelefono" required class="form-control" placeholder="Ingresa tu telefono">
                            </div>
                        </div> -->


                        <div class="mb-3">
                            <label for="txtContrasenia" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="txtContrasenia" id="txtContrasenia" required class="form-control" placeholder="Ingresa tu Contraseña">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="txtRol" value="2">

                        <button type="submit" class="btn btn-success w-100 py-3 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Registrarse
                        </button>

                        <div class="text-center">
                            <p class="text-muted">
                                ¿Ya tienes una cuenta? 
                                <a href="/login/init" class="text-primary">
                                    <i class="fas fa-sign-in-alt me-1"></i>Iniciar Sesión
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('txtContrasenia');
        const eyeIcon = event.currentTarget.querySelector('i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
