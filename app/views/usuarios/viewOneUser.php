
<div class="data-container">
    <form action="/user/create" method="post">
        <div class="form-group">
            <?php
            echo "ID: " . $id;
            ?>
        </div>
        <div class="form-group">
            <?php
            echo "Nombre: " . $nombre;
            ?>
              <?php
            echo "tipo Documento: " . $tipoDoc;
            ?>
            <?php
            echo " Documento: " . $documento;
            ?>
            <?php
            echo "Fecha Nacimiento: " . $fechaNa;
            ?>
            <?php
            echo "Email: " . $email;
            ?>
            <?php
            echo "Genero: " . $genero;
            ?>
            <?php
            echo "Estado: " . $estado;
            ?>
            <?php
            echo "Telefono: " . $telefono;
            ?>
            <?php
            echo "Eps: " . $eps;
            ?>
            <?php
            echo "Tipo Sangre: " . $tipoSangre;
            ?>
            <?php
            echo "Peso: " . $peso;
            ?>
            <?php
            echo "Estatura: " . $estatura;
            ?>
            <?php
            echo "Telefono Emergencias: " . $telefonoEmer;
            ?>
            <?php
            echo "Password: " . $password;
            ?>
            <?php
            echo "Observaciones: " . $observaciones;
            ?>
            <?php
            echo "Id Rol: " . $fkidRol;
            ?>
            <?php
            echo "Observaciones: " . $observaciones;
            ?>
            <?php
            echo "Id Grupo: " . $fkidGrupo;
            ?>
             <?php
            echo "id centro formacion: " . $fkidCentroForm;
            ?>
            <?php
            echo "Id Tipo User: " . $fkidTipoUserGym;
            ?>

            
        </div>
    </form>
</div>