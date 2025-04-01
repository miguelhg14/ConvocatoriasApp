<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impulsa tu Talento 2025</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #4CAF50;
            --dark-blue: #1e2a3a;
        }
        
        .navbar-brand img {
            height: 30px;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-green);
            border-bottom: 2px solid var(--primary-green);
            border-top: none;
            border-left: none;
            border-right: none;
            background-color: transparent;
        }
        
        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
        }
        
        .hero-section {
            background-color: var(--dark-blue);
            color: white;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .green-underline {
            border-bottom: 3px solid var(--primary-green);
            width: 40px;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        
        .btn-outline-light {
            border-color: #ffffff;
            color: #ffffff;
        }
        
        .play-button {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            width: 80px;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .category-pills .btn {
            border-radius: 20px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .category-pills .btn-success {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        
        .category-pills .btn-outline-secondary {
            color: #6c757d;
            border-color: #dee2e6;
        }
        
        .badge-destacado {
            background-color: var(--primary-green);
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 15px;
        }
        
        .card-info-icon {
            color: #6c757d;
            margin-right: 5px;
        }
        
        .search-bar {
            border-radius: 20px;
            border: 1px solid #dee2e6;
        }
        
        .search-bar input {
            border: none;
        }
        
        .search-bar input:focus {
            box-shadow: none;
        }
    </style>
</head>
<body class="bg-white">
    <div class="container py-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 19.5H22L12 2Z" fill="#4CAF50"/>
                    </svg>
                </a>
                <div class="d-flex align-items-center">
                    <a href="#" class="text-decoration-none text-secondary me-3">Cerrar Sesión</a>
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                        <span class="fw-bold"></span>
                    </div>
                </div>
            </div>
        </nav>
       <!-- <div class="user-profile">
    <a href="/convocatoria/init"><i class="fas fa-chalkboard-teacher"></i><span> Crear Convocatorias</span></a></li>
    <li><a href="/administrarUsuario/init"><i class="fas fa-users"></i><span>administrar Usuario</span></a></li>
    <a href="/userPerfil/init"><i class="fas fa-user-circle"></i>  Ícono de perfil <span>Perfil Usuario</span></a>
    <a href="/administrarConvocatorias/init"><i class="fas fa-bullhorn me-2"></i> Ícono de perfil <span>Administrar Convocatorias</span></a>

    <div class="user-name">Cerrar Sesión</div>
</div>
-->

        <!-- Search Bar -->
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="input-group search-bar">
                    <span class="input-group-text bg-transparent border-0">
                        <i class="fas fa-search text-secondary"></i>
                    </span>
                    <input type="text" class="form-control bg-transparent" placeholder="Buscar">
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mt-4 border-0">
            <li class="nav-item ms-auto">
                <a class="nav-link active" href="#">Descubrir</a>
            </li>
            <li class="nav-item ms-auto">
                <a class="nav-link" href="#">Explorar</a>
            </li>
            <li class="nav-item ms-auto">
                <a class="nav-link" href="#">
                    <i class="far fa-bookmark me-1"></i> Favoritos
                </a>
            </li>
        </ul>

        <!-- Hero Section -->
        <div class="hero-section p-4 mt-4">
            <div class="row">
                <div class="col-md-7">
                    <div class="badge bg-secondary bg-opacity-25 text-white mb-3">
                        <i class="fas fa-bolt me-1"></i> Programa Destacado
                    </div>
                    <h1 class="fw-bold">Impulsa tu Talento 2025</h1>
                    <div class="green-underline"></div>
                    <p class="mb-4">Conviértete en un profesional destacado y mejora tus habilidades con el apoyo del SENA. ¡Inicia hoy tu camino profesional!</p>
                    <div class="d-flex flex-wrap">
                        <a href="#" class="btn btn-primary me-2 mb-2">
                            <i class="fas fa-user-plus me-1"></i> Inscribirse Ahora
                        </a>
                        <a href="#" class="btn btn-outline-light mb-2">
                            <i class="fas fa-info-circle me-1"></i> Ver Detalles
                        </a>
                    </div>
                    <div class="d-flex mt-3">
                        <span class="badge bg-light text-dark me-2">Estudiantes</span>
                        <span class="badge bg-light text-dark me-2">Cursos</span>
                        <span class="badge bg-light text-dark">Empleabilidad</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Discover Section -->
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">
                    <i class="far fa-file-alt text-success me-2"></i> Descubre algo nuevo
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-secondary me-2">
                        <i class="fas fa-filter me-1"></i> Filtrar
                    </button>
                    <a href="#" class="text-decoration-none text-primary">Ver todos <i class="fas fa-chevron-right fa-xs"></i></a>
                </div>
            </div>
            
            <!-- Category Pills -->
            <div class="category-pills mb-4">
                <button class="btn btn-success">Todas</button>
                <button class="btn btn-outline-secondary">Empleo</button>
                <button class="btn btn-outline-secondary">Formación Técnica</button>
                <button class="btn btn-outline-secondary">Formación Tecnológica</button>
                <button class="btn btn-outline-secondary">Certificaciones</button>
                <button class="btn btn-outline-secondary">Prácticas</button>
                <button class="btn btn-outline-secondary">Internacional</button>
            </div>

          <!-- Cards -->
<div class="row">
    <!-- Tarjeta principal -->
    <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-8">
                        <span class="badge-destacado mb-3">
                            <i class="fas fa-certificate me-1"></i> Destacado
                        </span>
                        <h4 class="card-title fw-bold">Convocatoria Nacional de Talento Digital 2025</h4>
                        <p class="card-text text-muted">Forma parte de la nueva generación de profesionales en tecnologías de la información. Accede a formación de alta calidad y conecta con las mejores empresas del sector.</p>
                        <div class="d-flex flex-wrap mt-4">
                            <div class="me-4 mb-2">
                                <i class="far fa-calendar card-info-icon text-success"></i>
                                <small>Cierre: 20 Agosto 2025</small>
                            </div>
                            <div class="me-4 mb-2">
                                <i class="fas fa-map-marker-alt card-info-icon text-success"></i>
                                <small>Nacional</small>
                            </div>
                            <div class="mb-2">
                                <i class="fas fa-users card-info-icon text-success"></i>
                                <small>3,000 cupos disponibles</small>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success rounded-pill px-4">
                                <i class="fas fa-user-plus me-1"></i> Inscribirse
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de cursos - Primera fila -->
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=150&width=400" class="card-img-top bg-light" alt="Desarrollo Web">
                    <span class="badge bg-success position-absolute top-0 end-0 m-2">Nuevo</span>
                </div>
                <div class="p-3">
                    <h5 class="card-title">Técnico en Desarrollo de Aplicaciones Web</h5>
                    <p class="card-text text-muted small">Aprende a crear aplicaciones web modernas con las tecnologías más demandadas del mercado.</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Nivel: 15 Jul</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=150&width=400" class="card-img-top bg-light" alt="Análisis de Datos">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <div class="bg-secondary bg-opacity-50 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-play text-white fa-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <h5 class="card-title">Tecnólogo en Análisis de Datos</h5>
                    <p class="card-text text-muted small">Conviértete en un experto en análisis de datos y business intelligence.</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Nivel: 20 Jul</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=150&width=400" class="card-img-top bg-light" alt="Ciberseguridad">
                    <span class="badge bg-success position-absolute top-0 end-0 m-2">Popular</span>
                </div>
                <div class="p-3">
                    <h5 class="card-title">Especialización en Ciberseguridad</h5>
                    <p class="card-text text-muted small">Protege sistemas y redes con las técnicas más avanzadas de seguridad informática.</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Nivel: 25 Jul</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de cursos - Segunda fila -->
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=100&width=200" class="card-img-top bg-light" alt="Marketing Digital">
                </div>
                <div class="p-3">
                    <h5 class="card-title">Técnico en Marketing Digital</h5>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Inicio: 25 Jul</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=100&width=200" class="card-img-top bg-light" alt="Diseño UX/UI">
                </div>
                <div class="p-3">
                    <h5 class="card-title">Técnico en Diseño UX/UI</h5>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Inicio: 10 Ago</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=100&width=200" class="card-img-top bg-light" alt="Desarrollo Móvil">
                </div>
                <div class="p-3">
                    <h5 class="card-title">Tecnólogo en Desarrollo de Apps Móviles</h5>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Inicio: 1 Sep</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-0">
                <div class="position-relative">
                    <img src="/placeholder.svg?height=100&width=200" class="card-img-top bg-light" alt="Cloud Computing">
                </div>
                <div class="p-3">
                    <h5 class="card-title">Especialización en Cloud Computing</h5>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div>
                            <i class="far fa-clock text-muted me-1"></i>
                            <small class="text-muted">Inicio: 15 Ago</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm">Inscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Botón de cargar más -->
<div class="text-center mt-3 mb-5">
    <button class="btn btn-outline-secondary rounded-pill px-4">
        <i class="fas fa-sync-alt me-2"></i> Cargar más convocatorias
    </button>
</div>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>