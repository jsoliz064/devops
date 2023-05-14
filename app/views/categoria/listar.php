<?php require dirname(dirname(__FILE__)) . '/init/header.php';   ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL; ?>/home" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
    <div class="col s6 right-align ">
        <a href="<?php echo RUTA_URL; ?>/categoria/registrar" class="btn btn-#01579b light-blue darken-4">Crear Categoria</a>
    </div>
</div>


<div class="col s12 ">
    <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px;  padding-bottom: 30px;">
        <!-- <div class="card" > -->
        <div class="card-header" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px; padding-bottom: 30px;">
            <h4 class="center-align" style="color: white;">Categorias</h4>
        </div>
        <div class="responsive-table table-status-sheet table-striped">
            <table class="bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;color: white;">ID</th>
                        <th style="text-align: center;color: white;">Nombre</th>
                        <th style="text-align: center;color: white;">Descripcion</th>
                        <th style="text-align: center;color: white;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($datos['categorias'])) { ?>
                        <?php foreach ($datos['categorias'] as $categoria) : ?>
                            <tr>
                                <td style="text-align: center;"> <?php echo $categoria->id; ?></td>
                                <td style="text-align: center;"> <?php echo $categoria->nombre; ?></td>
                                <td style="text-align: center;"> <?php echo $categoria->descripcion; ?></td>
                                <td style="text-align: center;">
                                    <a style="" class="btn red" href="<?php echo RUTA_URL . "/categoria/actualizar/" . $categoria->id; ?>">Editar</a>
                                    <a class="btn orange" href="<?php echo RUTA_URL . "/categoria/eliminar/" . $categoria->id; ?>">Borrar</a>
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