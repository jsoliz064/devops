<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL ?>/servicio/servicio/listarCategoria" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
<div class="">

</div>

<div class="card" style="background-color:#41B5C2;margin-left: 80px; margin-right: 90px;">
    <h4 class="center-align" style="color: white;">Registrar Servicio</h4>
    <div class="container">
        <form action="<?php echo RUTA_URL ?>/servicio/registrar" method="POST">
            <div class="form-group">
                <label for="nombre" style="color: white;">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="descripcion" style="color: white;">Descripcion: <sup>*</sup></label>
                <input type="text" name="descripcion" class="form-control form-control-lg">
            </div>

            <div class="form-group">
                <label style="color: white;">Escoge la Categoria:<sup>*</sup></label> <br><br>
                <select name="categoria_id" id="categoria_id" class="form-control form-control-lg" style="background-color:#41B5C2;">
                    <?php foreach ($datos['categorias'] as $categoria) : ?>
                        <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <input type="submit" class="btn btn-success #01579b light-blue darken-4" value="Agregar Servicio">
        </form>
    </div>
    <br><br>
</div>
<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>