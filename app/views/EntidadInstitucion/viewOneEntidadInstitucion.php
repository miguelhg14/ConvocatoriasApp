<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detalles de la Línea</h5>
        </div>
        <div class="card-body">
            <form action="/entidadInstitucion/create" method="post">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label fw-bold">ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" value="<?php echo $id; ?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label fw-bold">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" value="<?php echo $nombre; ?>" readonly>
                    </div>
                </div>
                <div class="text-end">
                    <a href="/entidadInstitucion/init" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>