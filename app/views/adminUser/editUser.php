<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<h1>Editar Usuario</h1>

<form method="POST" action="/usuarios/editar/<?php echo $usuario['id']; ?>">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
    </div>
    
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
    </div>
    
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>" required>
    </div>
    
    <div class="form-group">
        <label for="contrasenia">Contraseña (dejar en blanco para no cambiar)</label>
        <input type="password" class="form-control" id="contrasenia" name="contrasenia">
    </div>
    
    <div class="form-group">
        <label for="idRol">Rol</label>
        <select class="form-control" id="idRol" name="idRol" required>
            <option value="">Seleccione un rol</option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?php echo $rol['id']; ?>" <?php echo ($usuario['idRol'] == $rol['id'] ? 'selected' : ''); ?>>
                    <?php echo $rol['tipoRol']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="/usuarios/lista" class="btn btn-secondary">Cancelar</a>
</form>