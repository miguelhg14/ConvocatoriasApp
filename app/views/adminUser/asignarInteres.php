<?php
// usuarios/asignarInteres.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Interés a Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .main-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            resize: vertical;
        }
        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="main-container">
            <div class="form-header">
                Asignar Interés a Usuario
            </div>

            <?php if (isset($error)): ?>
                <div class="error">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="/usuarioInteres/asignarInteres" method="POST">
                <div class="form-group">
                    <label for="idUsuario">ID del Usuario</label>
                    <input type="number" id="idUsuario" name="idUsuario" required>
                </div>

                <div class="form-group">
                    <label for="idInteres">Selecciona un Interés</label>
                    <select id="idInteres" name="idInteres" required>
                        <option value="" selected disabled>Seleccione un interés</option>
                        <?php
                        // Aquí deberías obtener la lista de intereses desde la base de datos
                        // Por ejemplo, usando un modelo para obtener todos los intereses
                        $intereses = []; // Esto debería ser reemplazado por una consulta a la base de datos
                        foreach ($intereses as $interes): ?>
                            <option value="<?php echo $interes['id']; ?>"><?php echo htmlspecialchars($interes['nombre']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="submit-button">Asignar Interés</button>
            </form>
        </div>
    </div>
</body>
</html>