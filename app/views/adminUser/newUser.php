<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<h1>Crear Nuevo Usuario</h1>

<form method="POST" action="/usuarios/nuevo">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
    </div>
    
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    
    <div class="form-group">
        <label for="contrasenia">Contraseña</label>
        <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
    </div>
    
    <div class="form-group">
        <label for="idRol">Rol</label>
        <select class="form-control" id="idRol" name="idRol" required>
            <option value="">Seleccione un rol</option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?php echo $rol['id']; ?>"><?php echo $rol['tipoRol']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="/usuarios/lista" class="btn btn-secondary">Cancelar</a>
</form>