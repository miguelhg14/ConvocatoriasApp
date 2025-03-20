<!-- Header -->
<header>
        <div class="logo">
            <img src="/img/sena2.jpg" alt="SENA Logo">
        </div>
        <div class="user-profile">
    <a href="/convocatoria/init"><i class="fas fa-chalkboard-teacher"></i><span> Crear Convocatorias</span></a></li>
    <li><a href="/administrarUsuario/init"><i class="fas fa-users"></i><span>administrar Usuario</span></a></li>
    <a href="/userPerfil/init"><i class="fas fa-user-circle"></i> <!-- Ícono de perfil --><span>Perfil Usuario</span></a>

    <div class="user-name">Cerrar Sesión</div>
</div>

    </header>

    <!-- Barra de búsqueda y navegación -->
    <div class="search-section">
        <div class="search-bar">
            <i>🔍</i>
            <input type="text" placeholder="Buscar">
        </div>
        
        <div class="nav-links">
            <a href="#">Descubrir</a>
            <a href="#">Explorar</a>
        </div>
    </div>

    <div class="container">
<!-- Banner principal -->
<div class="main-banner">
    <img src="/img/image.png" class="banner-image" alt="Impulsa tu talento">
    <div class="banner-content">
        <h1>Impulsa tu Talento 2025</h1>
        <br><br>
        <pre>Oportunidad única para desarrollar
tus habilidades con el apoyo del SENA,
¡inscríbete y crece profesionalmente!</pre>
<br>
        <a href="#" class="btn-inscribirse">Inscribirse</a>
    </div>
</div>
<form action="/menu/init" method="post" enctype="multipart/form-data">
        <!-- Sección de favoritos -->
        <div class="favorites-section">
            <div class="favorites-header">Favoritos</div>

            <div class="favorite-item">
                <div class="favorite-icon bg-teal">👥</div>
                <div class="favorite-text">Únete a Nuestro Equipo</div>
            </div>

            <div class="favorite-item">
                <div class="favorite-icon bg-purple">📚</div>
                <div class="favorite-text">Capacitación Gratuita con el SENA</div>
            </div>

            <div class="favorite-item">
                <div class="favorite-icon bg-orange">🎓</div>
                <div class="favorite-text">Becas y Oportunidades Educativas</div>
            </div>

            <div class="favorite-item">
                <div class="favorite-icon bg-blue">📋</div>
                <div class="favorite-text">Convocatoria de Empleo</div>
            </div>

            <div class="favorite-item">
                <div class="favorite-icon bg-cyan">🏆</div>
                <div class="favorite-text">Certificación Profesional con el SENA</div>
            </div>

            <div class="favorite-item">
                <div class="favorite-icon bg-orange">📝</div>
                <div class="favorite-text">Inscripciones Abiertas</div>
            </div>
        </div>

        <!-- Sección descubre algo nuevo -->
        <div class="discover-section">
            <div class="section-header">
                <div class="section-title">Descubre algo nuevo ></div>
                <div class="navigation-arrows">
                    <div class="nav-arrow">&#10092;</div>
                    <div class="nav-arrow">&#10093;</div>
                </div>
            </div>

            <div class="cards-container">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/sena2.jpg" alt="Convocatoria de Reclutamiento">
                    </div>
                    <div class="card-content">
                        <div class="card-category">Recursos Humanos</div>
                        <div class="card-title">Convocatoria de Reclutamiento</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="/img/sena2.jpg" alt="Tu Futuro Profesional">
                    </div>
                    <div class="card-content">
                        <div class="card-category">Desarrollo Personal</div>
                        <div class="card-title">Tu Futuro Profesional Comienza Aquí</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="/img/image.png" alt="Bolsa de Empleo">
                    </div>
                    <div class="card-content">
                        <div class="card-category">Empleo</div>
                        <div class="card-title">Bolsa de Empleo Abierta</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="/img/SENA.jpg" alt="Analiza y Elige la Mejor Oferta">
                    </div>
                    <div class="card-content">
                        <div class="card-category">Análisis Mercado</div>
                        <div class="card-title">Analiza y Elige la Mejor Oferta</div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="/img/sena2.jpg" alt="Oportunidades Laborales">
                    </div>
                    <div class="card-content">
                        <div class="card-category">Empleo</div>
                        <div class="card-title">Oportunidades Laborales Disponibles</div>
                    </div>
                </div>
            </div>
    <script src="/js/scripts.js">

    </script>

    <div class="container">
    <h1><?php echo $title ?? 'Convocatorias'; ?></h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <div class="convocatorias-grid">
        <?php if (!empty($convocatorias)): ?>
            <?php foreach ($convocatorias as $convocatoria): ?>
                <div class="convocatoria-card">
                    <?php if (!empty($convocatoria->imagen)): ?>
                        <img src="<?php echo $convocatoria->imagen; ?>" alt="<?php echo htmlspecialchars($convocatoria->nombre); ?>" class="card-image">
                    <?php endif; ?>
                    
                    <div class="card-content">
                        <h2><?php echo htmlspecialchars($convocatoria->nombre); ?></h2>
                        <p class="descripcion"><?php echo htmlspecialchars($convocatoria->descripcion); ?></p>
                        
                        <div class="card-details">
                            <p><strong>Modalidad:</strong> <?php echo htmlspecialchars($convocatoria->modalidad); ?></p>
                            <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($convocatoria->ubicacion); ?></p>
                            <p><strong>Fecha Inicio:</strong> <?php echo date('d/m/Y', strtotime($convocatoria->fechaInicio)); ?></p>
                            <p><strong>Fecha Fin:</strong> <?php echo date('d/m/Y', strtotime($convocatoria->fechaFin)); ?></p>
                        </div>
                        
                        <div class="card-actions">
                            <a href="/convocatoria/detalle/<?php echo $convocatoria->id; ?>" class="btn-ver-mas">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-results">No hay convocatorias disponibles en este momento.</p>
        <?php endif; ?>
    </div>
</div>

<style>
.convocatorias-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.convocatoria-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.convocatoria-card:hover {
    transform: translateY(-5px);
}

.card-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-content {
    padding: 15px;
}

.card-content h2 {
    margin: 0 0 10px 0;
    font-size: 1.5em;
    color: #333;
}

.descripcion {
    color: #666;
    margin-bottom: 15px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-details {
    font-size: 0.9em;
    color: #555;
}

.card-details p {
    margin: 5px 0;
}

.card-actions {
    margin-top: 15px;
    text-align: right;
}

.btn-ver-mas {
    display: inline-block;
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.btn-ver-mas:hover {
    background-color: #0056b3;
}

.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 20px;
    color: #666;
}
</style>