<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<h1>Lista de Usuarios</h1>
<a href="/usuarios/nuevo" class="btn btn-success mb-3">Crear Nuevo Usuario</a>

<table class="table table-bordered">
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
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['apellido']; ?></td>
                <td><?php echo $usuario['correo']; ?></td>
                <td><?php echo $usuario['idRol']; ?></td>
                <td>
                    <a href="/usuarios/editar/<?php echo $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/usuarios/eliminar/<?php echo $usuario['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                    <a href="/usuarios/ver/<?php echo $usuario['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>