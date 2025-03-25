<div class="container py-4">
    <div class="row justify-content-center">
        <!-- Usamos col-md-6 o col-lg-4 para limitar el tamaño de la columna en diferentes pantallas -->
        <div class="col-12 col-sm-10 col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-center text-white">
                    <h2 class="mb-3"><i class="fas fa-user-circle me-2"></i>Inicio de Sesión</h2>
                    <p class="mb-0">Bienvenido de nuevo! Por favor ingresa tus credenciales</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="/login/init" method="post" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="txtCorreo" class="form-label fw-bold">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Ingresa tu Correo" required>
                                <div class="invalid-feedback">
                                    Por favor ingresa un correo válido
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="txtPassword" class="form-label fw-bold">Contraseña</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Ingresa tu Contraseña" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="invalid-feedback">
                                    Por favor ingresa tu contraseña
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Ingresar
                            </button>
                        </div>

                        <div class="text-center pt-3">
                            <p class="mb-0">¿No tienes una cuenta?
                                <a href="/registro/initRegistro" class="text-success fw-bold text-decoration-none">Regístrate aquí</a>
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
        const passwordField = document.getElementById('txtPassword');
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
