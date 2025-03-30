<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Agregar Requisito
                        <a href="/requisitos/init" class="btn btn-danger float-end">Volver</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="/requisitos/create" method="POST">
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="observaciones">Observaciones</label>
                            <textarea name="observaciones" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="idEntidad">Entidad</label>
                            <input type="number" name="idEntidad" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="idRequisitoSeleccion">Requisito Selección</label>
                            <input type="number" name="idRequisitoSeleccion" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>