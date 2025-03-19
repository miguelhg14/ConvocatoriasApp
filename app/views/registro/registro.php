<div class="login-container">
    <h2>Registrarse</h2>
    <form action="/registro/initRegistro" method="post">
        <?php if(isset($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        
        <div class="input-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre" required>
        </div>

        <div class="input-group">
            <label for="txtApellido">Apellido</label>
            <input type="text" name="txtApellido" id="txtApellido" required>
        </div>
        
        <div class="input-group">
            <label for="txtCorreo">Correo</label>
            <input type="email" name="txtCorreo" id="txtCorreo" required>
        </div>
        
        <div class="input-group">
            <label for="txtContrasenia">Contraseña</label>
            <input type="password" name="txtContrasenia" id="txtContrasenia" required>
        </div>

        <input type="hidden" name="txtRol" value="2">
        
        <button type="submit">Registrarse</button>

        <div class="register-link">
            <p>¿Ya tienes una cuenta? <a href="/login/init">Iniciar Sesión</a></p>
        </div>
    </form>
</div>