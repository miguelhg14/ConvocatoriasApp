<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
   <link rel="stylesheet" href="../css/editarPerfil.css">
</head>
<body>
</head>
<body>
    <div class="header">
        <div class="main-container">
            <div class="form-header">
                Editar Perfil
            </div>

            <?php if (isset($error)): ?>
                <div class="error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="/perfilUser/init" method="post">
                <input type="hidden" name="idUsuario" value="<?php echo isset($usuario['id']) ? $usuario['id'] : ''; ?>">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo isset($usuario['nombre']) ? htmlspecialchars($usuario['nombre']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo isset($usuario['apellido']) ? htmlspecialchars($usuario['apellido']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo isset($usuario['correo']) ? htmlspecialchars($usuario['correo']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="contrasenia">Nueva Contraseña (opcional)</label>
                    <input type="password" id="contrasenia" name="contrasenia">
                </div>

                <div class="form-group">
                    <label for="idRol">Rol</label>
                    <select id="idRol" name="idRol" required>
                        <option value="" selected disabled>Seleccione un rol</option>
                        <?php
                        // Aquí deberías obtener los roles desde la base de datos
                        $roles = [];
                        print_r($roles."hola"); // Esto debería ser reemplazado por una consulta a la tabla `roles`
                        foreach ($roles as $rol): ?>
                            <option value="<?php echo $rol['id']; ?>" <?php echo (isset($usuario['idRol']) && $rol['id'] == $usuario['idRol']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($rol['tipoRol']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="submit-button">Guardar Cambios</button>
            </form>

            <div class="actions">
                <a href="/menu/init/<?php echo isset($usuario['id']) ? $usuario['id'] : ''; ?>">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>