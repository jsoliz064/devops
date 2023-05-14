<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL ?>/cita/cita/listarcita" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="background-color:#41B5C2;;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
            <div class="card-header" style="background-color:#41B5C2;">
                <h5 class="center-align" style="color: white;">Cita Nro <?php echo $datos['cita']->id ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive"></div>
                <table class="table table-striped table-bordered table-md">
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
                        <tr>
                            <th style="color: white;"> Estado de la Cita:</th>
                            <td>
                                <?php if ($datos['cita']->estado == "P") { ?>
                                    <span class="badge badge-warning">
                                        <p style="color:white">Pendiente</p>
                                    </span>
                                <?php } ?>
                                <?php if ($datos['cita']->estado == "E") { ?>
                                    <span class="badge badge-info">
                                        <p style="color:white">En Proceso</p>
                                    </span>
                                <?php } ?>
                                <?php if ($datos['cita']->estado == "C") { ?>
                                    <span class="badge badge-success">
                                        <p style="color:white">Completado</p>
                                    </span>
                                <?php } ?>
                                <?php if ($datos['cita']->estado == "S") { ?>
                                    <span class="badge badge-danger">
                                        <p style="color:white">Sin Concluir</p>
                                    </span>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card" style="background-color:#dddd;">
            <div class="card-header" style="text-align: center;background-color:#dddd;">
                <h5>Detalles de la Cita</h5>
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
        <div class="card" style="background-color:#dddd;">

            <div class="card-header" style="text-align: center;background-color:#dddd;">
                <h6>Estados de la Solicitud</h6>
            </div>
            <div class="card-body" style="text-align: center;justify-content:center">
                <br>
                <form action="<?php echo RUTA_URL . "/cita/actualizarEstado/" . $datos['cita']->id; ?>" method="POST">
                    <p>
                        <label>
                            <input class="with-gap" name="group3" type="radio" value="Pendiente" />
                            <span style="color: black;">La Solicitud esta pendiente</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input class="with-gap" name="group3" type="radio"  value="En Proceso" />
                            <span style="color: black;">La Solicitud esta Proceso</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input class="with-gap" name="group3" type="radio" value="Concluido" />
                            <span style="color: black;">La Solicitud se ha Concluido</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input class="with-gap" name="group3" type="radio" value="NoConcluido" />
                            <span style="color: black;">La Solicitud no se ha podido Concluir</span>
                        </label>
                    </p>
                    <input type="submit" class="btn btn-danger blue" value="Cambiar de Estado">
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>