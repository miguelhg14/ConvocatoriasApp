<div class="login-container">
    <h2>Iniciar Sesion</h2>
    <form action="/login/init" method="post">
        <?php if (isset($error)): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <div class="input-group">
            <label for="txtDocumento">Correo</label>
            <input type="txtDocumento" name="txtCorreo" id="txtCorreo" require>
        </div>
        <div class="input-group">
            <label for="txtPassword">Contraseña</label>
            <input type="password" name="txtPassword" id="txtPassword" require>
        </div>
        <button type="submit">Ingrese</button>
    </form>
    <div class="register-link">
        <p>¿No tiene cuenta aún? <a href="/registro/initRegistro">Regístrese aquí</a></p>
    </div>
</div>