<div class="login-container">
    <h2>Registrarse</h2>
    <form action="/registro/init" method="post">
        <?php if(isset($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        
        <div class="input-group">
            <h3 style="text-align: center; margin-top: 0;">Tipo De Usuario</h3>
            <div class="checkbox-container">
                <div class="checkbox-group">
                    <input type="checkbox" id="persona" name="tipoUsuario" value="persona">
                    <label for="persona">Persona</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="empresa" name="tipoUsuario" value="empresa">
                    <label for="empresa">Empresa</label>
                </div>
            </div>
        </div>
        
        <div class="input-group">
            <label for="txtDocumento">Nº De Documento</label>
            <input type="text" name="txtDocumento" id="txtDocumento" required>
        </div>
        
        <div class="input-group">
            <label for="txtPassword">Contraseña</label>
            <input type="password" name="txtPassword" id="txtPassword" required>
        </div>
        
        <div class="register-link" style="margin-bottom: 15px;">
            <p>¿Ya Tiene Una Cuenta?</p>
        </div>
        
        <button type="submit">Ingresar</button>
    </form>
</div>
