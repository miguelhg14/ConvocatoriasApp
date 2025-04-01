<div class="container  py-0 ">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5"> <!-- Columnas más anchas -->
            <div class="card shadow-lg border-0 rounded-3"> <!-- Sombra más pronunciada y bordes redondeados -->
                <div class="card-header bg-success text-white text-center py-4"> <!-- Más padding vertical -->
                    <h2 class="h1 mb-2 fw-bold"> <!-- Título más grande y en negrita -->
                        <i class="fas fa-user-plus me-3"></i>Registrarse
                    </h2>
                </div>
                <div class="card-body p-4 p-md-5"> <!-- Más padding en pantallas grandes -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                            <i class="fas fa-exclamation-circle fs-4 me-3"></i> <!-- Icono más grande -->
                            <div class="fs-5"><?php echo $error; ?></div> <!-- Texto más grande -->
                        </div>
                    <?php endif; ?>

                    <form action="/registro/init" method="post">
                        <div class="mb-4"> <!-- Más margen inferior -->
                            <label for="txtNombre" class="form-label fs-5 fw-bold">Nombre</label> <!-- Texto más grande -->
                            <div class="input-group input-group-lg"> <!-- Input group más grande -->
                                <span class="input-group-text bg-light"><i class="fas fa-user fs-5"></i></span> <!-- Icono más grande -->
                                <input type="text" name="txtNombre" id="txtNombre" required 
                                       class="form-control form-control-lg" placeholder="Ingresa tu nombre"> <!-- Input más grande -->
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="txtCorreo" class="form-label fs-5 fw-bold">Correo Electrónico</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope fs-5"></i></span>
                                <input type="email" name="txtCorreo" id="txtCorreo" required 
                                       class="form-control form-control-lg" placeholder="Ingresa tu correo">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="txtContrasenia" class="form-label fs-5 fw-bold">Contraseña</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="fas fa-lock fs-5"></i></span>
                                <input type="password" name="txtContrasenia" id="txtContrasenia" required 
                                       class="form-control form-control-lg" placeholder="Ingresa tu contraseña">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                    <i class="fas fa-eye fs-5"></i> <!-- Icono más grande -->
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="txtRol" value="2">

                        <button type="submit" class="btn btn-success w-100 py-3 mb-4 fs-5 fw-bold"> <!-- Botón más grande -->
                            <i class="fas fa-sign-in-alt me-3"></i>Registrarse
                        </button>

                        <div class="text-center pt-3">
                            <p class="text-muted fs-5"> <!-- Texto más grande -->
                                ¿Ya tienes una cuenta? 
                                <a href="/login/init" class="text-primary fw-bold">
                                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
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