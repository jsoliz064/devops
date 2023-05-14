<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL; ?>/home" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
    <div class="col s6 right-align ">
        <a href="<?php echo RUTA_URL ?>/servicio//registrar" role="button" class="btn btn-#01579b light-blue darken-4 ">Añadir Servicio</a>
    </div>
</div>

<div class="col s12 ">
    <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
        <!-- <div class="card" > -->
        <div class="card-header" style="background-color:#41B5C2;">
            <h4 class="center-align" style="color: white;">Servicios</h4>
        </div>
        <div class="responsive-table table-status-sheet">
            <table class="bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;color: white;">Nombre</th>
                        <th style="text-align:center;color: white;">Descripcion</th>
                        <th style="text-align:center;color: white;">Categoria</th>
                        <th style="text-align:center;color: white;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['servicios'] as $servicio) : ?>
                        <tr>
                            <td style="text-align:center;"> <?php echo $servicio->nombre; ?></td>
                            <td style="text-align:center;"> <?php echo $servicio->descripcion; ?></td>
                            <td style="text-align:center;"> <?php echo formatoSC(json_encode($datos['categorias'][$servicio->categoria_id])); ?></td>
                            <td style="text-align:center;">
                                <a class="btn red"  href="<?php echo RUTA_URL . "/servicio/actualizar/" . $servicio->id; ?>">Editar</a>
                                <a class="btn orange" href="<?php echo RUTA_URL . "/servicio/eliminar/" . $servicio->id; ?>">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>