<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/assets/css/styles.css"> <!-- Ajusta la ruta de tu CSS -->
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="/administrarUsuario/update/<?php echo $usuario['id']; ?>" method="post" class="usuario-form">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
            </div>

            <div class="form-group">
                <label for="contrasenia">Contraseña (dejar en blanco para no cambiar):</label>
                <input type="password" id="contrasenia" name="contrasenia">
            </div>

            <div class="form-group">
                <label for="idRol">Rol:</label>
                <select id="idRol" name="idRol" required>
                    <option value="" selected disabled>Seleccione un rol</option>
                    <?php if (isset($roles) && !empty($roles)): ?>
                        <?php foreach ($roles as $rol): ?>
                            <option value="<?php echo htmlspecialchars($rol->id); ?>" <?php echo ($rol->id == $usuario['idRol']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($rol->tipoRol); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <button type="submit" class="submit-button">Actualizar Usuario</button>
            <a href="/administrarUsuario/lista" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>