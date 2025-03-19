<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style_dashboard.css">
    <link rel="stylesheet" href="/css/styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-content">
                <div class="logo-container">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M16 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                        <path d="M5 20l5 -.5l1 -2"></path>
                        <path d="M18 20v-5h-5.5l2.5 -6.5l-5.5 1l1.5 2"></path>
                    </svg>
                    <span class="logo-text">GymCPIC</span>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="/rol/index"><i class="fas fa-users"></i><span>Roles</span></a></li>
                        <li><a href="/convocatoria/init"><i class="fas fa-user-tag"></i><span>Convocatorias</span></a></li>
                        <li><a href="/user/index"><i class="fas fa-users-cog"></i><span>Usuarios</span></a></li>
                        <li><a href="/centro/index"><i class="fas fa-building"></i><span>Centro Formacion</span></a></li>
                        <li><a href="/programa/index"><i class="fas fa-chalkboard-teacher"></i><span>Programa formacion</span></a></li>
                        <!-- <li><a href=""><i class="fas fa-users"></i><span>Grupo</span></a></li> -->
                        <li><a href="/actividad/index"><i class="fas fa-calendar-check"></i><span>Actividades</span></a></li>
                        <!-- <li><a href=""><i class="fas fa-file-alt"></i><span>Registro ingreso</span></a></li>
                        <li><a href=""><i class="fas fa-chart-line"></i><span>Control Progreso</span></a></li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <button class="menu-toggle"><i class="fas fa-bars"></i> </button>
                <h1 class="page-title">Programas</h1>
                <div class="search-container">
                    <input type="text" placeholder="Buscar...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="header-icons">
                    <button><i class="fas fa-moon"></i> </button>
                    <button><i class="fas fa-bell"></i> </button>
                    <button><i class="fas fa-user-circle"></i> </button>
                </div>
            </header>
            <div class="content">
                <?php include_once $content; ?>
            </div>
        </main>
    </div>

    <script src="/js/scripts.js"></script>
</body>

</html>