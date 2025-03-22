<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/assets/css/styles.css"> <!-- Ajusta la ruta de tu CSS -->
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios</h1>

        <!-- Botón para crear nuevo usuario -->
        <a href="/administrarUsuario/init" class="btn btn-success">Crear Nuevo Usuario</a>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($usuarios) && !empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                            <td>
                                <?php
                                switch ($usuario['idRol']) {
                                    case 1:
                                        echo 'Administrador';
                                        break;
                                    case 2:
                                        echo 'Usuario';
                                        break;
                                    case 3:
                                        echo 'Empresa';
                                        break;
                                    default:
                                        echo 'Rol no definido';
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Enlace para editar -->
                                <a href="/administrarUsuario/edit/<?php echo $usuario['id']; ?>" class="btn btn-primary">Editar</a>
                                <!-- Enlace para eliminar -->
                                <a href="/administrarUsuario/delete/<?php echo $usuario['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>