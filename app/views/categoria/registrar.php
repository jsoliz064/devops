


<?php require dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL ?>/categoria/categoria/listarCategoria" class="btn btn-dark blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
<div class="">

</div>

<div class="card" style="margin-left: 80px; margin-right: 90px;background-color:#41B5C2;">
    <h4 class="center-align" style="color: white;">Registrar Categoria</h4>
    <div class="container">
        <form action="<?php echo RUTA_URL ?>/categoria/registrar" method="POST">
            <div class="form-group">
                <label for="nombre" style="color: white;">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="descripcion" style="color: white;">Descripcion: <sup>*</sup></label>
                <input type="text" name="descripcion" class="form-control form-control-lg">
            </div>
            <input type="submit" class="btn btn-success #01579b light-blue darken-4" value="Agregar Categoria">
        </form>
    </div>
    <br><br>
</div>
<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>