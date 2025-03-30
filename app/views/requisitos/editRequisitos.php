<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Requisito
                        <a href="/requisitos/init" class="btn btn-danger float-end">Volver</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="/requisitos/init" method="POST">
                        <input type="hidden" name="id" value="<?= $infoReal->id ?>">
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" value="<?= $infoReal->nombre ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="obervaciones">Observaciones</label>
                            <textarea name="obervaciones" class="form-control"><?= $infoReal->obervaciones ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="idEntidad">Entidad</label>
                            <input type="number" name="idEntidad" value="<?= $infoReal->idEntidad ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="idRequisitoSeleccion">Requisito Selección</label>
                            <input type="number" name="idRequisitoSeleccion" value="<?= $infoReal->idRequisitoSeleccion ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>