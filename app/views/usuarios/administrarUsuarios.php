<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .main-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="main-container">
            <div class="form-header">
                <?php echo isset($usuario) ? 'Editar Usuario' : 'Crear Usuario'; ?>
            </div>

            <?php if (isset($error)): ?>
                <div class="error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="/administrarUsuario/init" method="post">
                <?php if (isset($usuario)): ?>
                    <input type="hidden" name="idUsuario" value="<?php echo $usuario['id']; ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?? ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido'] ?? ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo'] ?? ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="contrasenia">Contraseña</label>
                    <input type="password" id="contrasenia" name="contrasenia">
                </div>

                <div class="form-group">
                    <label for="idRol">Rol</label>
                    <select id="idRol" name="idRol" required>
                        <option value="" selected disabled>Seleccione un rol</option>
                        <?php
                        // Aquí deberías obtener los roles desde la base de datos
                        $roles = []; // Esto debería ser reemplazado por una consulta a la tabla `roles`
                        foreach ($roles as $rol): ?>
                            <option value="<?php echo $rol['id']; ?>" <?php echo (isset($usuario) && $usuario['idRol'] == $rol['id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($rol['tipoRol']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="submit-button">Guardar Usuario</button>
            </form>
        </div>
    </div>
</body>
</html>