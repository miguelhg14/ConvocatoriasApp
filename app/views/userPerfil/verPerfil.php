<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Perfil</title>
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
        .profile-header {
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
        .profile-details {
            margin-bottom: 20px;
        }
        .profile-details label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        .profile-details p {
            margin: 0;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .actions a {
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .actions a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="main-container">
            <div class="profile-header">
                Perfil de Usuario
            </div>

            <?php if (isset($error)): ?>
                <div class="error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="profile-details">
                <label>Nombre:</label>
                <p><?php echo htmlspecialchars($usuario['nombre']); ?></p>
            </div>

            <div class="profile-details">
                <label>Apellido:</label>
                <p><?php echo htmlspecialchars($usuario['apellido']); ?></p>
            </div>

            <div class="profile-details">
                <label>Correo Electrónico:</label>
                <p><?php echo htmlspecialchars($usuario['correo']); ?></p>
            </div>

            <div class="profile-details">
                <label>Rol:</label>
                <p><?php echo htmlspecialchars($usuario['idRol']); ?></p>
            </div>

            <div class="profile-details">
                <label>Fecha de Creación:</label>
                <p><?php echo htmlspecialchars($usuario['fechaCreacion']); ?></p>
            </div>

            <div class="profile-details">
                <label>Última Actualización:</label>
                <p><?php echo htmlspecialchars($usuario['fechaActualizacion'] ?? 'No actualizado'); ?></p>
            </div>

            <div class="actions">
                <a href="/perfilUser/editar/<?php echo $usuario['id']; ?>">Editar Perfil</a>
            </div>
        </div>
    </div>
</body>
</html>