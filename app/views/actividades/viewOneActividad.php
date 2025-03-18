
<div class="data-container">
    <form action="/actividad/create" method="post">
        <div class="form-group">
            <?php
            echo "ID: " . $id;
            ?>
        </div>
        <div class="form-group">
            <?php
            echo "Nombre: " . $nombre;
            ?>
        </div>
        <div class="form-group">
            <?php
            echo "Descripcion: " . $descripcion;
            ?>
        </div>
    </form>
</div>