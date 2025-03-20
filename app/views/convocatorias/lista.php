<div class="header">
    <div class="main-container">
        <div class="form-header">
            Lista de Convocatorias
        </div>

        <div class="nav-buttons">
            <a href="/convocatoria/init" class="nav-btn">Crear Nueva Convocatoria</a>
        </div>

        <?php if (isset($error)): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="convocatorias-list">
            <?php if (!empty($convocatorias)): ?>
                <?php foreach ($convocatorias as $convocatoria): ?>
                    <div class="convocatoria-card">
                        <h2><?php echo htmlspecialchars($convocatoria->nombre); ?></h2>
                        <p class="descripcion"><?php echo htmlspecialchars($convocatoria->descripcion); ?></p>
                        <div class="convocatoria-details">
                            <p><strong>Modalidad:</strong> <?php echo htmlspecialchars($convocatoria->modalidad); ?></p>
                            <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($convocatoria->ubicacion); ?></p>
                            <p><strong>Fecha Inicio:</strong> <?php echo htmlspecialchars($convocatoria->fechaInicio); ?></p>
                            <p><strong>Fecha Fin:</strong> <?php echo htmlspecialchars($convocatoria->fechaFin); ?></p>
                        </div>
                        <div class="action-buttons">
                            <a href="/convocatoria/edit/<?php echo $convocatoria->id; ?>" class="edit-btn">Editar</a>
                            <a href="/convocatoria/delete/<?php echo $convocatoria->id; ?>"
                               class="delete-btn"
                               onclick="return confirm('¿Estás seguro de que deseas eliminar esta convocatoria?');">
                                Eliminar
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-convocatorias">No hay convocatorias disponibles.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .nav-buttons {
        margin-bottom: 20px;
        text-align: right;
    }

    .nav-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .convocatorias-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px 0;
    }

    .convocatoria-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .edit-btn,
    .delete-btn {
        padding: 8px 15px;
        border-radius: 4px;
        text-decoration: none;
        color: white;
    }

    .edit-btn {
        background-color: #4CAF50;
    }

    .delete-btn {
        background-color: #f44336;
    }

    .no-convocatorias {
        text-align: center;
        padding: 20px;
        color: #666;
    }
</style>