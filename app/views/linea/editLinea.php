<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-succes text-white">
                    <h4 class="mb-0">Editar Línea</h4>
                </div>
                <div class="card-body">
                    <form action="/linea/update/<?php echo $infoReal->id; ?>" method="post">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" value="<?php echo $infoReal->id; ?>" name="id" id="id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $infoReal->nombre; ?>" name="nombre" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" value="<?php echo $infoReal->descripcion; ?>" name="descripcion" id="descripcion" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>