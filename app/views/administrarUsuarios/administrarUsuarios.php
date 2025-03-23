<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#4ade80",
            secondary: "#f0fdf4",
          },
        },
      },
    };
  </script>
  <style>
    .status-active {
      background-color: rgba(16, 185, 129, 0.1);
      color: rgb(6, 95, 70);
    }

    .status-inactive {
      background-color: rgba(239, 68, 68, 0.1);
      color: rgb(153, 27, 27);
    }

    .status-suspended {
      background-color: rgba(245, 158, 11, 0.1);
      color: rgb(180, 83, 9);
    }

    .btn-edit {
      color: #10b981;
      border-color: #10b981;
    }

    .btn-edit:hover {
      background-color: #10b981;
      color: white;
    }

    .btn-delete {
      color: #ef4444;
      border-color: #ef4444;
    }

    .btn-delete:hover {
      background-color: #ef4444;
      color: white;
    }

    .btn-reinstate {
      color: #3b82f6;
      border-color: #3b82f6;
    }

    .btn-reinstate:hover {
      background-color: #3b82f6;
      color: white;
    }

    .btn-view {
      color: #6366f1;
      border-color: #6366f1;
    }

    .btn-view:hover {
      background-color: #6366f1;
      color: white;
    }
  </style>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#2ADB68FF", /* Verde claro */
            secondary: "#f0fdf4",
          },
        },
      },
    };
  </script>
  
</head>

<body class="bg-gray-50">
  <!-- Header -->
  <header class="bg-green-400 shadow-sm">
  <div class="container mx-auto px-10 py-10">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <!-- Flecha más grande -->
        <a href="/menu/init" class="text-white mr-4">
          <i class="fas fa-arrow-left text-2xl"></i>
        </a>
        <!-- Título con nuevo estilo -->
        <h1 class="text-4xl font-bold text-gray-100 mb-0 ">Administración de Perfiles</h1>
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
            <hr class="dropdown-divider" />
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
  <!-- Admin info -->
  <div class="bg-green-200 border-b">
    <div class="container mx-auto px-6 py-3">
      <div class="flex items-center">
        <div class="flex-shrink-0 me-3">
          <div class="bg-white rounded-full p-1 border-2 border-primary">
            <img id="profile-image" src="https://via.placeholder.com/40" alt="Admin"
              class="rounded-full w-10 h-10 cursor-pointer" />
          </div>
          <input type="file" id="file-input" style="display: none" accept="image/*" />
        </div>
        <div>
          <h2 class="font-semibold text-lg mb-0">Administrador</h2>
          <p class="text-sm text-gray-600 mb-0"> Panel de control de usuarios</p>
        </div>
        <span class="ms-auto badge bg-primary bg-opacity-10 text-success border border-success px-3 py-2"> 4 Usuarios
        </span>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="container mx-auto px-4 py-4">
    <!-- Search and filters -->
    <div class="row g-3 mb-4">
      <div class="col-md-8">
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="fas fa-search text-gray-400"></i> </span>
          <input type="text" class="form-control border-start-0" placeholder="Buscar Usuarios..." />
        </div>
      </div>
      <div class="col-md-4 d-flex gap-2">
        <button class="btn btn-outline-secondary flex-grow-0" data-bs-toggle="modal" data-bs-target="#filterModal"> <i
            class="fas fa-filter me-2"></i> Filtros </button>
        <button class="btn btn-primary flex-grow-1" data-bs-toggle="modal" data-bs-target="#newUserModal"> <i
            class="fas fa-user-plus me-2"></i> Nuevo Usuario</button>
      </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="userTabs" role="tablist">
      <li class="nav-item flex-fill text-center" role="presentation">
        <button class="nav-link active w-100" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane"
          type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true"> Todos </button>
      </li>
      <li class="nav-item flex-fill text-center" role="presentation"><button class="nav-link w-100" id="active-tab"
          data-bs-toggle="tab" data-bs-target="#active-tab-pane" type="button" role="tab"
          aria-controls="active-tab-pane" aria-selected="false"> Activos </button>
      </li>
      <li class="nav-item flex-fill text-center" role="presentation">
        <button class="nav-link w-100" id="inactive-tab" data-bs-toggle="tab" data-bs-target="#inactive-tab-pane"
          type="button" role="tab" aria-controls="inactive-tab-pane" aria-selected="false">
          Inactivos
        </button>
      </li>
      <li class="nav-item flex-fill text-center" role="presentation">
        <button class="nav-link w-100" id="suspended-tab" data-bs-toggle="tab" data-bs-target="#suspended-tab-pane"
          type="button" role="tab" aria-controls="suspended-tab-pane" aria-selected="false">
          Suspendidos
        </button>
      </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="userTabsContent">
      <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
        <!-- User cards -->
        <div class="d-flex flex-column gap-3">
          <!-- User 1 -->
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <!-- Contenedor de la imagen -->
                <div class="col-auto">
                  <div class="bg-white rounded-circle p-1 border-2 border-primary">
                    <img id="profile-image" src="https://via.placeholder.com/40" alt="Admin"
                      class="rounded-circle w-10 h-10 cursor-pointer" />
                  </div>
                  <input type="file" id="file-input" style="display: none" accept="image/*" />
                </div>
          
                <!-- Contenedor de los datos -->
                <div class="col-md-7 col-sm-10">
                  <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                    <h5 class="card-title mb-0">María López</h5>
                    <span class="badge rounded-pill status-active px-3">activo</span>
                  </div>
                  <div class="d-flex flex-wrap text-muted">
                    <span class="me-3">maria@ejemplo.com</span>
                    <span class="me-3"><i class="fas fa-shield-alt me-1"></i> Editor</span>
                    <span><i class="fas fa-clock me-1"></i> Último acceso: Hace 3 días</span>
                  </div>
                </div>
          
                <!-- Contenedor de los botones -->
                <div class="col-md-4 mt-3 mt-md-0">
                  <div class="d-flex flex-wrap justify-content-md-end gap-2">
                    <button class="btn btn-sm btn-outline-secondary btn-view">
                      <i class="fas fa-eye me-1"></i> Ver
                    </button>
                   <!-- Botón que abre el modal -->
                <button class="btn btn-sm btn-outline-secondary btn-edit" data-bs-toggle="modal" data-bs-target="#modalEditar">
                <i class="fas fa-edit me-1"></i> Editar
                </button>
                    <button class="btn btn-sm btn-outline-secondary btn-reinstate">
                      <i class="fas fa-sync-alt me-1"></i> Reingresar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>


  <!-- Modal para editar un usuario -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Encabezado del modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Cuerpo del modal -->
      <div class="modal-body">
        <!-- Formulario dentro del modal -->
        <form id="newUserForm" action="/administrarUsuario/init" method="post" enctype="multipart/form-data">
          <!-- Campo Nombre -->
          <div class="mb-3">
            <label for="txtNombre" class="form-label">
              <i class="fas fa-user"></i> Nombre
            </label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingrese su nombre" required />
          </div>
          <!-- Campo Apellido -->
          <div class="mb-3">
            <label for="txtApellido" class="form-label">
              <i class="fas fa-user-tag"></i> Apellido
            </label>
            <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Ingrese su apellido" required />
          </div>
          <!-- Campo Correo electrónico -->
          <div class="mb-3">
            <label for="txtEmail" class="form-label">
              <i class="fas fa-envelope"></i> Correo electrónico
            </label>
            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ingrese su correo" required />
          </div>
          <!-- Campo Contraseña -->
          <div class="mb-3">
            <label for="txtPassword" class="form-label">
              <i class="fas fa-lock"></i> Contraseña
            </label>
            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Ingrese su contraseña" required />
          </div>
        </form>
      </div>
      <!-- Pie del modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        <!-- Botón para enviar el formulario -->
        <button type="submit" form="newUserForm" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>


  <!-- Filter Modal -->
  <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filtrar usuarios</h5>
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
      <div class="modal-header">
        <h5 class="modal-title" id="newUserModalLabel">
          Añadir nuevo usuario
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario dentro del modal -->
        <form id="newUserForm" action="/administrarUsuario/init" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="txtNombre" class="form-label">
              <i class="fas fa-user"></i> Nombre
            </label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingrese su nombre" required />
          </div>
          <div class="mb-3">
            <label for="txtApellido" class="form-label">
              <i class="fas fa-user-tag"></i> Apellido
            </label>
            <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Ingrese su apellido" required />
          </div>
          <div class="mb-3">
            <label for="txtEmail" class="form-label">
              <i class="fas fa-envelope"></i> Correo electrónico
            </label>
            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Ingrese su correo" required />
          </div>
          <div class="mb-3">
            <label for="txtPassword" class="form-label">
              <i class="fas fa-lock"></i> Contraseña
            </label>
            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Ingrese su contraseña" required />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        <!-- Botón para enviar el formulario -->
        <button type="submit" form="newUserForm" class="btn btn-primary">Crear usuario</button>
      </div>
    </div>
  </div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document
      .getElementById("profile-image")
      .addEventListener("click", function () {
        document.getElementById("file-input").click();
      });

    document
      .getElementById("file-input")
      .addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            document.getElementById("profile-image").src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
  </script>