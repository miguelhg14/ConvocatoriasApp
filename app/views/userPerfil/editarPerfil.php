<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
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
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            resize: vertical;
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
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .actions a {
            text-decoration: none;
            color: #fff;
            background-color: #6c757d;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .actions a:hover {
            background-color: #5a6268;
        }
    </style>
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

            <form action="/userPerfil/init" method="post">
                <input type="hidden" name="idUsuario" value="<?php echo $usuario['id']; ?>">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
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
                        $roles = []; // Esto debería ser reemplazado por una consulta a la tabla `roles`
                        foreach ($roles as $rol): ?>
                            <option value="<?php echo $rol['id']; ?>" <?php echo ($rol['id'] == $usuario['idRol']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($rol['tipoRol']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="submit-button">Guardar Cambios</button>
            </form>

            <div class="actions">
                <a href="/userPerfil/ver/<?php echo $usuario['id']; ?>">Volver al Perfil</a>
            </div>
        </div>
    </div>
</body>
</html>