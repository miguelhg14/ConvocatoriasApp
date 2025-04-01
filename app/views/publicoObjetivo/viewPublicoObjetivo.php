<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Público Objetivo
                        <a href="/publicoObjetivo/new" class="btn btn-primary float-end">Agregar Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($publicosObjetivo as $publicoObjetivo) : ?>
                                <tr>
                                    <td><?= $publicoObjetivo->id ?></td>
                                    <td><?= $publicoObjetivo->nombre ?></td>
                                    <td>
                                        <a href="/publicoObjetivo/view/<?= $publicoObjetivo->id ?>" class="btn btn-info btn-sm">Ver</a>
                                        <a href="/publicoObjetivo/edit/<?= $publicoObjetivo->id ?>" class="btn btn-success btn-sm">Editar</a>
                                        <a href="/publicoObjetivo/delete/<?= $publicoObjetivo->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>