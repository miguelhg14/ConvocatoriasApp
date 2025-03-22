<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Usuarios</title>
    <link rel="stylesheet" href="/css/convocatorias.css">
</head>
<body>
    <header>
        <h1>Panel de Administración de Usuarios</h1>
        <nav>
            <ul>
                <li><a href="/administrarUsuario/lista">Lista de Usuarios</a></li>
                <li><a href="/administrarUsuario/init">Crear Usuario</a></li>
             
            </ul>
        </nav>
    </header>

    <main>
        <?php
        if (isset($content) && file_exists($content)) {
            include_once $content;
        } else {
            echo "<p>Error: La vista no está disponible.</p>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Administración de Usuarios</p>
    </footer>
</body>
</html>