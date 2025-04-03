<!-- Asegúrate de incluir FontAwesome en el header de tu layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Same styles as original */
    .list-group-item {
        border-radius: 0 !important;
        border-left: 4px solid transparent;
        transition: all 0.2s ease;
    }

    .list-group-item:hover {
        border-left: 4px solid #0d6efd;
        background-color: #f8f9fa;
    }

    .list-group-item.active {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .list-group-item i {
        width: 20px;
    }

    .custom-header {
        background: linear-gradient(135deg, #0d6efd 0%, #0099ff 100%);
        padding: 1rem 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .custom-footer {
        background: #2c3e50;
        color: white;
        padding: 1.5rem 0;
        margin-top: 3rem;
    }

    .main-wrapper {
        min-height: calc(100vh - 200px);
    }
</style>

<!-- Header -->
<header class="custom-header mb-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="text-white mb-0">
                    <i class="fas fa-layer-group me-2"></i>
                    Sistema de Convocatorias
                </h1>
            </div>
            <div class="col-md-6 text-end">
                <span class="text-white">
                    <i class="fas fa-user-circle me-2"></i>
                    Bienvenido, Usuario
                </span>
            </div>
        </div>
    </div>
</header>

<!-- Main Content Wrapper -->
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Menú Lateral Estático -->
            <div class="col-md-2">
                <div class="card position-fixed" style="width: 16%;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Menú de Gestión</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="/linea/init" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-chart-line me-2"></i> Línea
                            </a>
                            <a href="/publicoObjetivo/init" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-users me-2"></i> Público Objetivo
                            </a>
                            <a href="/requisitos/init" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-list-check me-2"></i> Requisitos
                            </a>
                            <a href="/entidadInstitucion/init" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-building me-2"></i> Entidad Institución
                            </a>
                            <a href="/rol/index" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-user-tag me-2"></i> Rol
                            </a>
                            <a href="/requisitoSeleccion/init" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-tasks me-2"></i> Requisitos Selección
                            </a>
                            <a href="/tipo/init" class="list-group-item list-group-item-action active d-flex align-items-center">
                                <i class="fas fa-tag me-2"></i> Tipo
                            </a>
                            <a href="/convocatoria/lista" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-bullhorn me-2"></i> Convocatorias
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="col-md-10">
                <div class="container">
                    <!-- Botón Nuevo con estilo Bootstrap -->
                    <a href="/tipo/new" class="btn btn-primary mb-3">
                        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABzklEQVRIS7WVPUsDQRCGd3MBDShiJ4poZSFo8AcINoIflVpoo5WINiIIVn5ibSGCIHZaCBaSQhEECxGsLNJJUMTGXlIIYvbWZ+Ricpe73CWcB1vc7Oz77M7Mzkrxz5/8Z31RFaC1bhBKTQkpR9hImtHN0Iw3RlZofS0s60JK+R200UAA4qPCtg8d0WoHfRGJxCKQWz8nX4BWahvnrRrCZ+O7Ji1rz7umAoD4Dk6bNYiXu64A2S83uACEZZywXNYpbpbZhGuQcD0UNf4AiDch/sxEW2DCLOvXn1OaRAd9OSB9xcSXAEotscIkNfDj+FEAAsAEgIwRKgEKhSvKcSwWgBDHbGbBDVDqHUN7TIAsgAEv4BNDylUBTkjCku6Tkw8ArV5AHkNzTIA8gBYvIIehJ6YQPQHo9QLOMMzEBDgFMOetolmq6CQWgNbTMpk8dwO0TnHRTJg6gyAR74G5aGnuwZcLYH64zcNAbsKqpsq8aRVDiN8Xffya3TqTu3VCljnlgasS/YSo6w3spqtGffEUvqveTloRonKY01mPsHWEnMY8OPOE5c7PL+zJbOTJnHR6VD8CXSZVjFfGI8ImXxnEC4GFUWesIy+LGuPIgl7HH8BGsBl9FV1ZAAAAAElFTkSuQmCC' alt='Nuevo' class="me-2"/>
                        Nuevo
                    </a>

                    <!-- Lista de registros -->
                    <?php if (isset($tipos) && is_array($tipos)): ?>
                        <div class="list-group">
                            <?php foreach ($tipos as $key => $value): ?>
                                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-bold"><?= $value->id ?> - <?= $value->nombre ?></span>
                                    </div>
                                    <div class="btn-group">
                                        <a href="/tipo/view/<?= $value->id ?>" class="btn btn-sm btn-outline-primary">Consultar</a>
                                        <a href="/tipo/edit/<?= $value->id ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                        <a href="/tipo/delete/<?= $value->id ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="custom-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5>Sistema de Convocatorias</h5>
                <p class="mb-0">© 2023 Todos los derechos reservados</p>
            </div>
            <div class="col-md-6 text-end">
                <div class="social-links">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>