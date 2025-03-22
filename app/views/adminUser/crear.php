<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="/assets/css/styles.css"> <!-- Ajusta la ruta de tu CSS -->
</head>
<body>
    <div class="header">
        <div class="main-container">
            <div class="form-header">
                Crear Usuario
            </div>

            <div class="nav-buttons">
                <a href="/administrarUsuario/lista" class="nav-btn">Ver todos los usuarios</a>
            </div>

            <?php if (isset($error)): ?>
                <div class="error-message">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="/administrarUsuario/init" method="post" class="usuario-form">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>

    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
    </div>

    <div class="form-group">
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
    </div>

    <div class="form-group">
        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia" required>
    </div>

    <div class="form-group">
        <label for="idRol">Rol:</label>
        <select id="idRol" name="idRol" required>
            <option value="" selected disabled>Seleccione un rol</option>
            <?php if (isset($roles) && !empty($roles)): ?>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?php echo htmlspecialchars($rol->id); ?>">
                        <?php echo htmlspecialchars($rol->tipoRol); ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <button type="submit" class="submit-button">Crear Usuario</button>
</form>
        </div>
    </div>
</body>
</html>