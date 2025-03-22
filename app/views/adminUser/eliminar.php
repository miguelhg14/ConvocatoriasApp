<?php
// eliminar.php (ubicación: views/usuarios/eliminar.php)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="/assets/css/styles.css"> <!-- Ajusta la ruta de tu CSS -->
</head>
<body>
    <div class="container">
        <h1>Eliminar Usuario</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <p>¿Estás seguro de que deseas eliminar al usuario <strong><?php echo htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?></strong>?</p>

        <form action="/administrarUsuario/delete/<?php echo $usuario['id']; ?>" method="POST">
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                <a href="/administrarUsuario/lista" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>