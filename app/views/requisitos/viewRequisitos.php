<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Requisitos
                        <a href="/requisitos/new" class="btn btn-primary float-end">Agregar Nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Observaciones</th>
                                <th>Entidad</th>
                                <th>Requisito Selección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php foreach ($requisitos as $requisito) : ?>
                                <tr>
                                    <td><?= $requisito->nombre ?></td>
                                    <td><?= $requisito->obervaciones ?></td>
                                    <td><?= $requisito->idEntidad ?></td>
                                    <td><?= $requisito->idRequisitoSeleccion ?></td>
                                    <td>
                                        <a href="/requisitos/view/<?= $requisito->id ?>" class="btn btn-info btn-sm">Ver</a>
                                        <a href="/requisitos/edit/<?= $requisito->id ?>" class="btn btn-success btn-sm">Editar</a>
                                        <a href="/requisitos/delete/<?= $requisito->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este registro?')">Eliminar</a>
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