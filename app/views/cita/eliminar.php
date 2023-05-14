<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL ?>/cita/cita/listarcita" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
            <div class="card-header" style="background-color:#41B5C2;">
                <h5 class="center-align" style="color: white;">Cita Nro <?php echo $datos['cita']->id ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive"></div>
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th style="color: white;">Fecha de Atencion:</th>
                            <td><?php echo $datos['cita']->fecha ?></td>
                        </tr>
                        <tr>
                            <th style="color: white;"> Descripcion:</th>
                            <td><?php echo $datos['cita']->descripcion ?></td>
                        </tr>
                        <tr>
                            <th style="color: white;"> Paciente a Atender:</th>
                            <td> <span class="badge badge-success">
                                    <p style="color:white"><?php echo $datos['paciente']->nombre ?></p>
                                </span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card" style="background-color:#dddd;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
            <div class="card-header" style="text-align: center;background-color:#dddd;">
                <h6>Detalles de la Cita</h6>
            </div>
            <div class="card-body">
                <table class="table" id="lista-alquiler">
                    <thead class="table-dark">
                        <tr>
                            <th style="text-align: center;">Fecha de Entrada</th>
                            <th style="text-align: center;">Fecha de Salida</th>
                            <th style="text-align: center;">Odontologo Asignado</th>
                            <th style="text-align: center;">Servicio</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php if (isset($datos['detallesCita'])) { ?>
                            <?php foreach ($datos['detallesCita'] as $detalle) : ?>
                                <tr>
                                    <td style="text-align: center;"> <?php echo $detalle->hora_entrada; ?></td>
                                    <td style="text-align: center;"> <?php echo $detalle->hora_salida; ?></td>
                                    <td style="text-align: center;"> <?php echo $datos['odontologos'][$detalle->odontologo_id]; ?></td>
                                    <td style="text-align: center;"> <?php echo $datos['servicios'][$detalle->servicio_id]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <form action="<?php echo RUTA_URL . "/cita/eliminar/" . $datos['cita']->id; ?>" method="POST">
            <input type="submit" class="btn btn-danger red" value="Eliminar">
        </form>

    </div>
</div>



<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>