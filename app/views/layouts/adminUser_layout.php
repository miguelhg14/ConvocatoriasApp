<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="/css/convocatorias.css"> <!-- Asegúrate de que esta ruta sea correcta -->
    <!-- Agrega aquí otros estilos o scripts necesarios -->
</head>
<body>
    <header>
        <h1>Panel de Administración de Usuarios</h1>
        <nav>
            <ul>
                <li><a href="/usuarios/lista">Lista de Usuarios</a></li>
                <li><a href="/usuarios/nuevo">Crear Usuario</a></li>
                <!-- Agrega más enlaces de navegación si es necesario -->
            </ul>
        </nav>
    </header>

    <main>
        <?php include_once $content; ?> <!-- Aquí se incluye la vista específica -->
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Administración de Usuarios</p>
    </footer>
</body>
</html>