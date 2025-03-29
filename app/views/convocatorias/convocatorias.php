<div class="d-grid">
    <button type="submit" class="btn btn-success btn-lg">Publicar Convocatoria</button>
</div>

<div class="container-fluid py-30">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-14 col-xl-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center p-4">
                    <h2 class="h3 mb-3"><i class="fas fa-bullhorn me-2"></i>Convocatorias</h2>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <a href="/convocatoria/lista" class="btn btn-outline-primary">Ver todas las convocatorias</a>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger mb-4">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="/convocatoria/init" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Convocatoria</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaRevision" class="form-label">Fecha de Revisión</label>
                            <input type="date" class="form-control" id="fechaRevision" name="fechaRevision" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaCierre" class="form-label">Fecha de Cierre</label>
                            <input type="date" class="form-control" id="fechaCierre" name="fechaCierre" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="objetivo" class="form-label">Objetivo</label>
                            <textarea class="form-control" id="objetivo" name="objetivo" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="fkIdEntidad" class="form-label">Entidad</label>
                            <select class="form-select" id="fkIdEntidad" name="fkIdEntidad" required>
                                <option value="" selected disabled>Seleccione una entidad</option>
                                <?php if (isset($entidades) && !empty($entidades)): ?>
                                    <?php foreach ($entidades as $entidad): ?>
                                        <option value="<?php echo htmlspecialchars($entidad->id); ?>">
                                            <?php echo htmlspecialchars($entidad->nombre); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div> -->

                        <!-- <div class="mb-3">
                            <label for="fkIdInvestigador" class="form-label">Investigador Responsable</label>
                            <select class="form-select" id="fkIdInvestigador" name="fkIdInvestigador" required>
                                <option value="" selected disabled>Seleccione un investigador</option>
                                <?php if (isset($investigadores) && !empty($investigadores)): ?>
                                    <?php foreach ($investigadores as $investigador): ?>
                                        <option value="<?php echo htmlspecialchars($investigador->id); ?>">
                                            <?php echo htmlspecialchars($investigador->nombre); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div> -->

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Publicar Convocatoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>