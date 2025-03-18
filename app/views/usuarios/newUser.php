<div class="data-container">
    <form action="/user/create" method="post">
        <div class="form-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre" required>
        </div>

        <div class="form-group">
            <label for="txtTipoDoc">Tipo Documento</label>
            <input type="text" name="txtTipoDoc" id="txtTipoDoc" required>
        </div>

        <div class="form-group">
            <label for="txtDocumento">Documento</label>
            <input type="text" name="txtDocumento" id="txtDocumento" required>
        </div>

        <div class="form-group">
            <label for="txtFechaNac">Fecha de Nacimiento</label>
            <input type="date" name="txtFechaNac" id="txtFechaNac">
        </div>

        <div class="form-group">
            <label for="txtEmail">Email</label>
            <input type="email" name="txtEmail" id="txtEmail">
        </div>

        <div class="form-group">
            <label for="txtGenero">Género</label>
            <select name="txtGenero" id="txtGenero">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="txtEstado">Estado</label>
            <input type="text" name="txtEstado" id="txtEstado">
        </div>

        <div class="form-group">
            <label for="txtTelefono">Teléfono</label>
            <input type="tel" name="txtTelefono" id="txtTelefono">
        </div>

        <div class="form-group">
            <label for="txtEps">EPS</label>
            <input type="text" name="txtEps" id="txtEps">
        </div>

        <div class="form-group">
            <label for="txtTipoSangre">Tipo de Sangre</label>
            <input type="text" name="txtTipoSangre" id="txtTipoSangre">
        </div>

        <div class="form-group">
            <label for="txtPeso">Peso (kg)</label>
            <input type="number" name="txtPeso" id="txtPeso" step="0.1">
        </div>

        <div class="form-group">
            <label for="txtEstatura">Estatura (m)</label>
            <input type="number" name="txtEstatura" id="txtEstatura" step="0.01">
        </div>

        <div class="form-group">
            <label for="txtTelefonoEmer">Teléfono Emergencia</label>
            <input type="tel" name="txtTelefonoEmer" id="txtTelefonoEmer">
        </div>

        <div class="form-group">
            <label for="txtPassword">Contraseña</label>
            <input type="password" name="txtPassword" id="txtPassword">
        </div>

        <div class="form-group">
            <label for="txtObservaciones">Observaciones</label>
            <textarea name="txtObservaciones" id="txtObservaciones"></textarea>
        </div>

        <div class="form-group">
            <label for="txtFkidRol">ID Rol</label>
            <input type="text" name="txtFkidRol" id="txtFkidRol">
        </div>

        <div class="form-group">
            <label for="txtFkidGrupo">ID Grupo</label>
            <input type="text" name="txtFkidGrupo" id="txtFkidGrupo">
        </div>

        <div class="form-group">
            <label for="txtFkidCentroForm">ID Centro Formación</label>
            <input type="text" name="txtFkidCentroForm" id="txtFkidCentroForm">
        </div>

        <div class="form-group">
            <label for="txtFkidTipoUserGym">ID Tipo Usuario Gym</label>
            <input type="text" name="txtFkidTipoUserGym" id="txtFkidTipoUserGym">
        </div>

        <div class="form-group">
            <button type="submit">Crear</button>
        </div>
    </form>
</div>
