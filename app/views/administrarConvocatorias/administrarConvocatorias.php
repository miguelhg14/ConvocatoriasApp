<!-- Header -->
<header class="bg-green-400 shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-white mr-2">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <h1 class="text-xl font-bold text-white mb-0">Administración de Convocatorias</h1>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-download me-2"></i> Exportar
                                convocatorias</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i> Ver
                                estadísticas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Configuración</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Admin info -->
    <div class="bg-green-200 border-b">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-white rounded-full p-1 border-2 border-primary">
                        <img id="profile-image" src="https://via.placeholder.com/40" alt="Admin"
                            class="rounded-full w-10 h-10 cursor-pointer" />
                    </div>
                </div>
                <div>
                    <h2 class="font-semibold text-lg mb-0">Administrador</h2>
                    <p class="text-sm text-gray-600 mb-0">Panel de control de convocatorias</p>
                </div>
                <div class="ms-auto flex gap-2">
                    <span class="badge bg-primary bg-opacity-10 text-success border border-success px-3 py-2">
                        <i class="fas fa-bullhorn me-1"></i> 5 Convocatorias
                    </span>
                    <span class="badge bg-blue-100 text-blue-800 border border-blue-200 px-3 py-2">
                        <i class="fas fa-users me-1"></i> 120 Aplicantes
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="container mx-auto px-4 py-4">
        <!-- Search and filters -->
        <div class="row g-3 mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="fas fa-search text-gray-400"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Buscar Convocatorias...">
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button class="btn btn-outline-secondary flex-grow-0" data-bs-toggle="modal"
                    data-bs-target="#filterModal">
                    <i class="fas fa-filter me-2"></i> Filtros
                </button>
                <button class="btn btn-primary flex-grow-1" data-bs-toggle="modal"
                    data-bs-target="#newConvocatoriaModal">
                    <i class="fas fa-plus me-2"></i> Nueva Convocatoria
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4" id="convocatoriaTabs" role="tablist">
            <li class="nav-item flex-fill text-center" role="presentation">
                <button class="nav-link active w-100" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane"
                    type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">Todas</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
                <button class="nav-link w-100" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-tab-pane"
                    type="button" role="tab" aria-controls="active-tab-pane" aria-selected="false">Activas</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
                <button class="nav-link w-100" id="draft-tab" data-bs-toggle="tab" data-bs-target="#draft-tab-pane"
                    type="button" role="tab" aria-controls="draft-tab-pane" aria-selected="false">Borradores</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
                <button class="nav-link w-100" id="closed-tab" data-bs-toggle="tab" data-bs-target="#closed-tab-pane"
                    type="button" role="tab" aria-controls="closed-tab-pane" aria-selected="false">Cerradas</button>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="convocatoriaTabsContent">
            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab"
                tabindex="0">
                <!-- Convocatoria cards -->
                <div class="d-flex flex-column gap-3">
                    <!-- Convocatoria 1 -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Columna para la imagen y los datos -->
                                <div class="col-md-8">
                                    <div class="d-flex align-items-start gap-3">
                                        <!-- Imagen pequeña -->
                                        <div class="flex-shrink-0">
                                            <div class="bg-white rounded-circle p-1 border-2 border-primary">
                                                <img id="profile-image" src="https://via.placeholder.com/40" alt="Admin"
                                                    class="rounded-circle w-10 h-10 cursor-pointer" />
                                            </div>
                                            <input type="file" id="file-input" style="display: none" accept="image/*" />
                                        </div>
                    
                                        <!-- Datos al lado de la imagen -->
                                        <div class="flex-grow-1">
                                            <!-- Título y estado -->
                                            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                                <h5 class="card-title mb-0">Beca de Investigación 2023</h5>
                                                <span class="badge rounded-pill status-active px-3">Activa</span>
                                            </div>
                    
                                            <!-- Fechas, aplicantes y categoría -->
                                            <div class="d-flex flex-wrap text-muted mb-2">
                                                <span class="me-3"><i class="fas fa-calendar me-1"></i> 15/01/2023 - 15/03/2023</span>
                                                <span class="me-3"><i class="fas fa-users me-1"></i> 45 aplicantes</span>
                                                <span><i class="fas fa-tag me-1"></i> Investigación</span>
                                            </div>
                    
                                            <!-- Descripción -->
                                            <p class="card-text mb-2">Programa de becas para investigadores en áreas de ciencias y tecnología.</p>
                    
                                            <!-- Barra de progreso -->
                                            <div class="d-flex align-items-center mb-2">
                                                <small class="text-muted me-2">Progreso: 45%</small>
                                                <div class="progress flex-grow-1" style="height: 8px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 45%"
                                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Columna para los botones -->
                                <div class="col-md-4 mt-3 mt-md-0">
                                    <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                        <button class="btn btn-sm btn-outline-secondary btn-view">
                                            <i class="fas fa-eye me-1"></i> Ver
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary btn-edit" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-edit me-1"></i> Editar
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary btn-delete">
                                            <i class="fas fa-trash me-1"></i> Eliminar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               <!-- Otros tabs con contenido similar -->
            <div class="tab-pane fade" id="active-tab-pane" role="tabpanel" aria-labelledby="active-tab" tabindex="0">
                <!-- Contenido para convocatorias activas -->
            </div>
            <div class="tab-pane fade" id="draft-tab-pane" role="tabpanel" aria-labelledby="draft-tab" tabindex="0">
                <!-- Contenido para borradores -->
            </div>
            <div class="tab-pane fade" id="closed-tab-pane" role="tabpanel" aria-labelledby="closed-tab" tabindex="0">
                <!-- Contenido para convocatorias cerradas -->
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtrar convocatorias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoryFilter" class="form-label">Categoría</label>
                        <select class="form-select" id="categoryFilter">
                            <option selected>Todas las categorías</option>
                            <option value="education">Educación</option>
                            <option value="research">Investigación</option>
                            <option value="internship">Pasantías</option>
                            <option value="environment">Medio Ambiente</option>
                            <option value="innovation">Innovación</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dateRangeFilter" class="form-label">Período</label>
                        <select class="form-select" id="dateRangeFilter">
                            <option selected>Cualquier fecha</option>
                            <option value="current">En curso</option>
                            <option value="upcoming">Próximas</option>
                            <option value="past">Pasadas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="applicantsFilter" class="form-label">Número de aplicantes</label>
                        <select class="form-select" id="applicantsFilter">
                            <option selected>Cualquier cantidad</option>
                            <option value="0-10">0-10 aplicantes</option>
                            <option value="11-50">11-50 aplicantes</option>
                            <option value="51+">Más de 50 aplicantes</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aplicar filtros</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newConvocatoriaModal" tabindex="-1" aria-labelledby="newConvocatoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="newConvocatoriaModalLabel">
                    <i class="fas fa-bullhorn me-2"></i>Nueva Convocatoria
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Formulario -->
            <form id="formConvocatoria" action="/administrarConvocatorias/init" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Nombre de la Convocatoria -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtNombre" class="form-label">
                                <i class="fas fa-tag me-2"></i>Nombre Convocatoria
                            </label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                placeholder="Nombre de la convocatoria" required>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtDescripcion" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Descripción
                            </label>
                            <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"
                                placeholder="Descripción de la convocatoria" required></textarea>
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtCategoria" class="form-label">
                                <i class="fas fa-folder me-2"></i>Categoría
                            </label>
                            <select class="form-select" name="txtCategoria" id="txtCategoria" required>
                                <option selected>Seleccionar categoría</option>
                                <!-- Opciones dinámicas aquí -->
                            </select>
                        </div>
                    </div>

                    <!-- Fechas -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="txtFechaInicio" class="form-label">
                                <i class="fas fa-calendar-alt me-2"></i>Fecha de Inicio
                            </label>
                            <input type="date" class="form-control" name="txtFechaInicio" id="txtFechaInicio" required>
                        </div>
                        <div class="col-md-6">
                            <label for="txtFechaCierre" class="form-label">
                                <i class="fas fa-calendar-times me-2"></i>Fecha de Cierre
                            </label>
                            <input type="date" class="form-control" name="txtFechaCierre" id="txtFechaCierre" required>
                        </div>
                    </div>

                    <!-- Modalidad -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtModalidad" class="form-label">
                                <i class="fas fa-tasks me-2"></i>Modalidad
                            </label>
                            <select class="form-select" name="txtModalidad" id="txtModalidad" required>
                                <option selected>Seleccionar Modalidad</option>
                                <!-- Opciones dinámicas aquí -->
                            </select>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtUbicacion" class="form-label">
                                <i class="fas fa-map-marker-alt me-2"></i>Ubicación
                            </label>
                            <input type="text" class="form-control" id="txtUbicacion" name="txtUbicacion"
                                placeholder="Ubicación de la convocatoria" required>
                        </div>
                    </div>

                    <!-- Requisitos -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtRequisitos" class="form-label">
                                <i class="fas fa-list-alt me-2"></i>Requisitos
                            </label>
                            <textarea class="form-control" id="txtRequisitos" name="txtRequisitos" rows="5"
                                placeholder="Requisitos de la convocatoria" required></textarea>
                        </div>
                    </div>

                    <!-- Beneficios -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtBeneficios" class="form-label">
                                <i class="fas fa-gift me-2"></i>Beneficios
                            </label>
                            <textarea class="form-control" id="txtBeneficios" name="txtBeneficios" rows="3"
                                placeholder="Beneficios de la convocatoria" required></textarea>
                        </div>
                    </div>

                    <!-- Imagen de la Convocatoria -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="txtimagenConvocatorias" class="form-label">
                                <i class="fas fa-image me-2"></i>Imagen de la Convocatoria
                            </label>
                            <input type="file" class="form-control" id="txtimagenConvocatorias"
                                name="txtimagenConvocatorias" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <!-- Footer del Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-2"></i>Crear
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>