
<div class="data-container">
    <?php
    echo "<a href='/user/new' class='new'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABzklEQVRIS7WVPUsDQRCGd3MBDShiJ4poZSFo8AcINoIflVpoo5WINiIIVn5ibSGCIHZaCBaSQhEECxGsLNJJUMTGXlIIYvbWZ+Vicpe73CWcB1vc7Oz77M7Mzkrxz5/8Z31RFaC1bhBKTQkpR9hImtHN0Iw3RlZofS0s60JK+R200UAA4qPCtg8d0WoHfRGJxCKQWz8nX4BWahvnrRrCZ+O7Ji1rz7umAoD4Dk6bNYiXu64A2S83uACEZZywXNYpbpbZhGuQcD0UNf4AiDch/sxEW2DCLOvXn1OaRAd9OSB9xcSXAEotscIkNfDj+FEAAsAEgIwRKgEKhSvKcSwWgBDHbGbBDVDqHUN7TIAsgAEv4BNDylUBTkjCku6Tkw8ArV5AHkNzTIA8gBYvIIehJ6YQPQHo9QLOMMzEBDgFMOetolmq6CQWgNbTMpk8dwO0TnHRTJg6gyAR74G5aGnuwZcLYH64zcNAbsKqpsq8aRVDiN8Xffya3TqTu3VCljnlgasS/YSo6w3spqtGffEUvqveTloRonKY01mPsHWEnMY8OPOE5c7PL+zJbOTJnHR6VD8CXSZVjFfGI8ImXxnEC4GFUWesIy+LGuPIgl7HH8BGsBl9FV1ZAAAAAElFTkSuQmCC'/></a>";
    if (isset($usuario) && is_array($usuario)) {
        foreach ($usuario as $key => $value) {
            echo "
                        <div class='record'>
                           <span>
        <?= $value->id ?> - <?= $value->nombre ?> - <?= $value->tipoDoc ?> - <?= $value->documento ?> - <?= $value->fechaNac ?> - 
        <?= $value->email ?> - <?= $value->genero ?> - <?= $value->estado ?> - <?= $value->telefono ?> - <?= $value->eps ?> - 
        <?= $value->tipoSangre ?> - <?= $value->peso ?>kg - <?= $value->estatura ?>m - <?= $value->telefonoEmer ?> - 
        <?= $value->observaciones ?> - <?= $value->fkidRol ?> - <?= $value->fkidGrupo ?> - <?= $value->fkidCentroForm ?> - <?= $value->fkidTipoUserGym ?>
    </span>
                            <div class='buttons'>
                                <a href='/rol/view/$value->id'>Consultar</a>
                                <a href='/rol/edit/$value->id'>Editar</a>
                                <a href='/rol/delete/$value->id'>Eliminar</a>
                            </div>
                        </div>";
        }
    }
    ?>
</div>