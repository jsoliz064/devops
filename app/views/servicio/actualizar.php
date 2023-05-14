<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL; ?>/servicio" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>

</div>


<div class="col s12 ">
    <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px;  padding-bottom: 30px; margin-left: 150px; margin-right: 150px">
        <div class="card-header" style="background-color:#41B5C2;">
        <h4 class="center-align" style="color: white;">Actualizar Servicio</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo RUTA_URL . '/servicio/actualizar/' . $datos['servicio']->id; ?>" method="POST">
                <div class="form-group">
                    <label for="id"  style="color: white;">ID: </label>
                    <input type="text" name="id" class="form-control form-control-lg" value="<?php echo $datos['servicio']->id ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nombre"  style="color: white;">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" class="form-control form-control-lg" value="<?php echo $datos['servicio']->nombre ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion"  style="color: white;">Descripcion: <sup>*</sup></label>
                    <input type="text" name="descripcion" class="form-control form-control-lg" value="<?php echo $datos['servicio']->descripcion ?>">
                </div>
                <div class="form-group">
                    <label style="color: white;">Escoge la Categoria:<sup>*</sup></label> <br><br>
                    <select name="categoria_id" id="categoria_id" class="form-control form-control-lg" style="background-color:#41B5C2">
                        <?php foreach ($datos['categorias'] as $categoria) : ?>
                            <?php if ($categoria->id == $datos['servicio']->categoria_id) { ?>
                                <option value="<?php echo $categoria->id; ?>" selected><?php echo $categoria->nombre; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <input type="submit" class="btn btn-success #01579b light-blue darken-4" value="Actualizar">

            </form>
        </div>

    </div>
</div>

<?php require  dirname(dirname(__FILE__)) . '/init/footer.php'; ?>