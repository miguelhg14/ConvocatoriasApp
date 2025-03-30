<div class="container mt-4">
    <!-- Botón Nuevo con estilo Bootstrap -->
    <a href="/entidadInstitucion/new" class="btn btn-primary mb-3">
        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABzklEQVRIS7WVPUsDQRCGd3MBDShiJ4poZSFo8AcINoIflVpoo5WINiIIVn5ibSGCIHZaCBaSQhEECxGsLNJJUMTGXlIIYvbWZ+Vicpe73CWcB1vc7Oz77M7Mzkrxz5/8Z31RFaC1bhBKTQkpR9hImtHN0Iw3RlZofS0s60JK+R200UAA4qPCtg8d0WoHfRGJxCKQWz8nX4BWahvnrRrCZ+O7Ji1rz7umAoD4Dk6bNYiXu64A2S83uACEZZywXNYpbpbZhGuQcD0UNf4AiDch/sxEW2DCLOvXn1OaRAd9OSB9xcSXAEotscIkNfDj+FEAAsAEgIwRKgEKhSvKcSwWgBDHbGbBDVDqHUN7TIAsgAEv4BNDylUBTkjCku6Tkw8ArV5AHkNzTIA8gBYvIIehJ6YQPQHo9QLOMMzEBDgFMOetolmq6CQWgNbTMpk8dwO0TnHRTJg6gyAR74G5aGnuwZcLYH64zcNAbsKqpsq8aRVDiN8Xffya3TqTu3VCljnlgasS/YSo6w3spqtGffEUvqveTloRonKY01mPsHWEnMY8OPOE5c7PL+zJbOTJnHR6VD8CXSZVjFfGI8ImXxnEC4GFUWesIy+LGuPIgl7HH8BGsBl9FV1ZAAAAAElFTkSuQmCC' alt='Nuevo' class="me-2"/>
        Nuevo
    </a>

    <!-- Lista de registros -->
    <?php if (isset($entidadInstituciones) && is_array($entidadInstituciones)): ?>
        <div class="list-group">
            <?php foreach ($entidadInstituciones as $key => $value): ?>
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-bold"><?= $value->id ?> - <?= $value->nombre ?></span>
        
                    </div>
                    <div class="btn-group">
                        <a href="/entidadInstitucion/view/<?= $value->id ?>" class="btn btn-sm btn-outline-primary">Consultar</a>
                        <a href="/entidadInstitucion/edit/<?= $value->id ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <a href="/entidadInstitucion/delete/<?= $value->id ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>