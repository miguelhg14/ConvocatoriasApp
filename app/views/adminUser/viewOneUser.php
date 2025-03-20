<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<h1>Detalles del Usuario</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> <?php echo $usuario['id']; ?></p>
        <p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?></p>
        <p><strong>Apellido:</strong> <?php echo $usuario['apellido']; ?></p>
        <p><strong>Correo:</strong> <?php echo $usuario['correo']; ?></p>
        <p><strong>Rol:</strong> <?php echo $usuario['idRol']; ?></p>
        <p><strong>Fecha de Creación:</strong> <?php echo $usuario['fechaCreacion']; ?></p>
        <p><strong>Fecha de Actualización:</strong> <?php echo $usuario['fechaActualizacion']; ?></p>
    </div>
</div>

<a href="/usuarios/lista" class="btn btn-secondary mt-3">Volver a la lista</a>