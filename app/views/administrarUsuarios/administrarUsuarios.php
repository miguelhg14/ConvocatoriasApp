<body class="bg-light">
  <!-- Header -->
  <header class=" card-header bg-success bg-gradient text-white text-center py-4 position-relative">
    <div class="container px-4 py-4">
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <!-- Flecha -->
          <a href="/menu/init" class="text-white me-3">
            <i class="fas fa-arrow-left fs-4"></i>
          </a>
          <!-- Título -->
          <h1 class="text-white mb-0 fs-3 fw-bold">Administración de Perfiles</h1>
        </div>
        <div class="dropdown">
          <button class="btn btn-sm text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-vertical"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-download me-2"></i> Exportar usuarios
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-upload me-2"></i> Importar usuarios
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>



  <!-- Admin info -->

  <div class="bg-success bg-opacity-25 border-bottom border-success border-opacity-25">
    <div class="container px-4 py-2">
      <div class="d-flex align-items-center">
        <div class="flex-shrink-0 me-3">
          <div class="bg-white rounded-circle p-1 border border-2 border-primary">
            <img id="profile-image" src="https://via.placeholder.com/40" alt="Admin"
              class="rounded-circle" style="width: 40px; height: 40px; cursor: pointer;">
          </div>
          <input type="file" id="file-input" class="d-none" accept="image/*">
        </div>
        <div>
          <h2 class="fw-semibold mb-0 fs-6">Administrador</h2>
          <p class="text-muted mb-0 small">Panel de control de usuarios</p>
        </div>
        <span class="ms-auto badge bg-success bg-opacity-10 text-success border border-success px-3 py-1"><?php echo $totalUsers; ?> Usuarios</span>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="container px-4 py-3">
    <!-- Search and filters -->
    <div class="row g-2 mb-3">
      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="fas fa-search text-secondary"></i></span>
          <input type="text" class="form-control" placeholder="Buscar Usuarios...">
        </div>
      </div>
      <div class="col-md-4 d-flex gap-2">
        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#filterModal">
          <i class="fas fa-filter me-2"></i> Filtros
        </button>
        <button class="btn btn-primary flex-grow-1" data-bs-toggle="modal" data-bs-target="#newUserModal">
          <i class="fas fa-user-plus me-2"></i> Nuevo Usuario
        </button>
      </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="userTabs" role="tablist">
      <li class="nav-item flex-fill text-center" role="presentation">
        <button class="nav-link active w-100" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane"
          type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">Todos</button>
      </li>
      <li class="nav-item flex-fill text-center" role="presentation">
        <button class="nav-link w-100" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-tab-pane"
          type="button" role="tab" aria-controls="active-tab-pane" aria-selected="false">Activos</button>
      </li>
      <li class="nav-item flex-fill text-center" role="presentation">
        <button class="nav-link w-100" id="inactive-tab" data-bs-toggle="tab" data-bs-target="#inactive-tab-pane"
          type="button" role="tab" aria-controls="inactive-tab-pane" aria-selected="false">Inactivos</button>
      </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="userTabsContent">
      <!-- Todos los usuarios -->
      <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
        <div class="d-flex flex-column gap-3">
          <?php foreach ($users as $user): ?>
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <div class="bg-white rounded-circle p-1 border border-2 border-primary">
                      <img src="https://via.placeholder.com/40" alt="User"
                        class="rounded-circle" style="width: 40px; height: 40px;">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-10">
                    <!-- En la pestaña "Todos" -->
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                      <h5 class="card-title mb-0 fs-6"><?php echo htmlspecialchars($user['nombre']); ?></h5>
                      <span class="badge rounded-pill px-2 <?php echo $user['estado'] === 'Inactivo' ? 'bg-danger' : 'bg-success'; ?>">
                        <?php echo htmlspecialchars($user['estado']); ?>
                      </span>
                    </div>
                    
                    <div class="d-flex flex-wrap text-muted small">
                      <span class="me-3"><?php echo htmlspecialchars($user['email']); ?></span>
                      <span class="me-3"><i class="fas fa-shield-alt me-1"></i> <?php echo htmlspecialchars($user['idRol']); ?></span>
                    </div>
                  </div>
                  <div class="col-md-4 mt-3 mt-md-0">
                    <div class="d-flex flex-wrap justify-content-md-end gap-2">
                      <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-eye me-1"></i> Ver
                      </button>
                      <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalEditar"
                        data-user-id="<?php echo $user['id']; ?>">
                        <i class="fas fa-edit me-1"></i> Editar
                      </button>
                      <button class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-sync-alt me-1"></i> Cambiar Estado
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Usuarios Activos -->
      <div class="tab-pane fade" id="active-tab-pane" role="tabpanel" aria-labelledby="active-tab" tabindex="0">
        <div class="d-flex flex-column gap-3">
          <?php foreach ($users as $user): ?>
            <?php if ($user['estado'] === 'Activo'): ?>
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="bg-white rounded-circle p-1 border border-2 border-primary">
                        <img src="https://via.placeholder.com/40" alt="User"
                          class="rounded-circle" style="width: 40px; height: 40px;">
                      </div>
                    </div>
                    <div class="col-md-7 col-sm-10">
                      <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                        <h5 class="card-title mb-0 fs-6"><?php echo htmlspecialchars($user['nombre']); ?></h5>
                        <span class="badge rounded-pill px-2 bg-success">
                          <?php echo htmlspecialchars($user['estado']); ?>
                        </span>
                      </div>
                      <div class="d-flex flex-wrap text-muted small">
                        <span class="me-3"><?php echo htmlspecialchars($user['email']); ?></span>
                        <span class="me-3"><i class="fas fa-shield-alt me-1"></i> <?php echo htmlspecialchars($user['idRol']); ?></span>
                      </div>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                      <div class="d-flex flex-wrap justify-content-md-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fas fa-eye me-1"></i> Ver
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalEditar"
                          data-user-id="<?php echo $user['id']; ?>">
                          <i class="fas fa-edit me-1"></i> Editar
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fas fa-sync-alt me-1"></i> Cambiar Estado
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Usuarios Inactivos -->
      <div class="tab-pane fade" id="inactive-tab-pane" role="tabpanel" aria-labelledby="inactive-tab" tabindex="0">
        <div class="d-flex flex-column gap-3">
          <?php foreach ($users as $user): ?>
            <?php if ($user['estado'] === 'Inactivo'): ?>
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="bg-white rounded-circle p-1 border border-2 border-primary">
                        <img src="https://via.placeholder.com/40" alt="User"
                          class="rounded-circle" style="width: 40px; height: 40px;">
                      </div>
                    </div>
                    <div class="col-md-7 col-sm-10">
                      <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                        <h5 class="card-title mb-0 fs-6"><?php echo htmlspecialchars($user['nombre']); ?></h5>
                        <span class="badge rounded-pill px-2 bg-danger">
                          <?php echo htmlspecialchars($user['estado']); ?>
                        </span>
                      </div>
                      <div class="d-flex flex-wrap text-muted small">
                        <span class="me-3"><?php echo htmlspecialchars($user['email']); ?></span>
                        <span class="me-3"><i class="fas fa-shield-alt me-1"></i> <?php echo htmlspecialchars($user['idRol']); ?></span>
                      </div>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                      <div class="d-flex flex-wrap justify-content-md-end gap-2">
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fas fa-eye me-1"></i> Ver
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalEditar"
                          data-user-id="<?php echo $user['id']; ?>">
                          <i class="fas fa-edit me-1"></i> Editar
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                          <i class="fas fa-sync-alt me-1"></i> Reingresar
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal para editar un usuario -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Encabezado del modal -->
        <div class="modal-header bg-light">
          <h5 class="modal-title fs-5" id="modalEditarLabel">Editar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <!-- Formulario dentro del modal -->
          <form id="editUserForm" action="/administrarUsuario/init" method="post" enctype="multipart/form-data">
            <!-- Campo Nombre -->
            <div class="mb-3">
              <label for="txtNombre" class="form-label">
                <i class="fas fa-user me-2"></i> Nombre
              </label>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingrese su nombre" required>
            </div>
            <!-- Campo Apellido -->
            <div class="mb-3">
              <label for="txtApellido" class="form-label">
                <i class="fas fa-user-tag me-2"></i> Apellido
              </label>
              <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Ingrese su apellido" required>
            </div>
            <!-- Campo Correo electrónico -->
            <div class="mb-3">
              <label for="txtEmail" class="form-label">
                <i class="fas fa-envelope me-2"></i> Correo electrónico
              </label>
              <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ingrese su correo" required>
            </div>
            <!-- Campo Contraseña -->
            <div class="mb-3">
              <label for="txtPassword" class="form-label">
                <i class="fas fa-lock me-2"></i> Contraseña
              </label>
              <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Ingrese su contraseña" required>
            </div>
          </form>
        </div>
        <!-- Pie del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          <!-- Botón para enviar el formulario -->
          <button type="submit" form="editUserForm" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter Modal -->
  <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h5 class="modal-title fs-5" id="filterModalLabel">Filtrar usuarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="roleFilter" class="form-label">Rol</label>
            <select class="form-select" id="roleFilter">
              <option selected>Todos los roles</option>
              <option value="admin">Administrador</option>
              <option value="editor">Editor</option>
              <option value="user">Usuario</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dateFilter" class="form-label">Fecha de registro</label>
            <select class="form-select" id="dateFilter">
              <option selected>Cualquier fecha</option>
              <option value="today">Hoy</option>
              <option value="week">Esta semana</option>
              <option value="month">Este mes</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="lastLoginFilter" class="form-label">Último acceso</label>
            <select class="form-select" id="lastLoginFilter">
              <option selected>Cualquier momento</option>
              <option value="today">Hoy</option>
              <option value="week">Esta semana</option>
              <option value="month">Este mes</option>
              <option value="inactive">Inactivo +30 días</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button type="button" class="btn btn-primary">
            Aplicar filtros
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- New User Modal -->
  <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h5 class="modal-title fs-5" id="newUserModalLabel">
            Añadir nuevo usuario
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- In the modal form -->
            <div class="modal-body">
              <!-- Formulario dentro del modal -->
              <form id="nuevoUserForm" action="/registro/init" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="nuevoTxtNombre" class="form-label">
                    <i class="fas fa-user me-2"></i> Nombre
                  </label>
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingrese su nombre" required>
                </div>

                <div class="mb-3">
                  <label for="nuevoTxtEmail" class="form-label">
                    <i class="fas fa-envelope me-2"></i> Correo electrónico
                  </label>
                  <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ingrese su correo" required>
                </div>
                <div class="mb-3">
                  <label for="nuevoTxtPassword" class="form-label">
                    <i class="fas fa-lock me-2"></i> Contraseña
                  </label>
                  <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Ingrese su contraseña" required>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
              <!-- Fix the form ID reference -->
              <button type="submit" form="nuevoUserForm" class="btn btn-primary">Crear usuario</button>
            </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document
      .getElementById("profile-image")
      .addEventListener("click", function() {
        document.getElementById("file-input").click();
      });

    document
      .getElementById("file-input")
      .addEventListener("change", function(event) {
        const file = event.target.files[0];

        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById("profile-image").src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
  </script>