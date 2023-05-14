<?php require dirname(dirname(__FILE__)) . '/init/header.php';   ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL; ?>/home" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
    <div class="col s6 right-align ">
        <a href="<?php echo RUTA_URL ?>/cita/registrar" class="btn btn-#01579b light-blue darken-4">Agendar Nueva Cita</a>
    </div>
</div>

<div class="col s12 ">
    <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
        <!-- <div class="card" > -->
        <div class="card-header" style="background-color:#41B5C2;">
            <h4 class="center-align" style="color: white;">Citas</h4>
        </div>
        <div class="responsive-table table-status-sheet">
            <table class="bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;color: white;">ID</th>
                        <th style="text-align:center;color: white;">Fecha</th>
                        <th style="text-align:center;color: white;">Paciente</th>
                        <th style="text-align:center;color: white;">Estado</th>
                        <th style="text-align:center;color: white;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($datos['citas'])) { ?>
                        <?php foreach ($datos['citas'] as $cita) : ?>
                            <tr>
                                <td style="text-align:center;"> <?php echo $cita->id; ?></td>
                                <td style="text-align:center;"> <?php echo $cita->fecha; ?></td>
                                <td style="text-align:center;"> <?php echo formatoSC(json_encode($datos['pacientes'][$cita->paciente_id])); ?></td>
                                <td style="text-align:center;">
                                    <?php if ($cita->estado == 'P') : ?>
                                        <div class="badge badge-pill badge-warning">Pendiente</div>
                                    <?php endif; ?>
                                    <?php if ($cita->estado == 'E') : ?>
                                        <div class="badge badge-pill badge-info">En Proceso</div>
                                    <?php endif; ?>
                                    <?php if ($cita->estado == 'C') : ?>
                                        <div class="badge badge-pill badge-success">Completado</div>
                                    <?php endif; ?>
                                    <?php if ($cita->estado == 'S') : ?>
                                        <div class="badge badge-pill badge-danger">Sin Concluir</div>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align:center;">
                                    <a class="btn red" href="<?php echo RUTA_URL ?>/cita/verDetalle/" . $cita->id; ?>">Ver Detalle</a>
                                    <a class="btn orange" href="<?php echo RUTA_URL . "/cita/eliminar/" . $cita->id; ?>">Borrar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>