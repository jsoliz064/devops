<?php require dirname(dirname(__FILE__)) . '/init/header.php';   ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL; ?>/home" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
    <div class="col s6 right-align ">
        <a href="<?php echo RUTA_URL ?>/paciente/registrar" class="btn btn-#01579b light-blue darken-4">Crear Paciente</a>
    </div>
</div>

<div class="col s12 ">
    <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
        <!-- <div class="card" > -->
        <div class="card-header" style="background-color:#41B5C2;">
            <h4 class="center-align" style="color: white;">Pacientes</h4>

        </div>
        <div class="responsive-table table-status-sheet">
            <table class="bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;color: white;">ID</th>
                        <th style="text-align:center;color: white;">Nombre</th>
                        <th style="text-align:center;color: white;">Direccion</th>
                        <th style="text-align:center;color: white;">Telefono</th>
                        <th style="text-align:center;color: white;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($datos['pacientes'])) { ?>
                        <?php foreach ($datos['pacientes'] as $paciente) : ?>
                            <tr>
                                <td style="text-align:center;"> <?php echo $paciente->id; ?></td>
                                <td style="text-align:center;"> <?php echo $paciente->nombre; ?></td>
                                <td style="text-align:center;"> <?php echo $paciente->direccion; ?></td>
                                <td style="text-align:center;"> <?php echo $paciente->telefono; ?></td>
                                <td style="text-align:center;">
                                    <a class="btn red" style="padding-right: 10px;" href="<?php echo RUTA_URL . '/paciente/actualizar/' . $paciente->id; ?>">Editar</a>
                                    <a class="btn orange" href="<?php echo RUTA_URL . "/paciente/eliminar/" . $paciente->id; ?>">Borrar</a>
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