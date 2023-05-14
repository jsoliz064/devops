<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL ?>/paciente/paciente/listarPaciente" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
<div class="card"  style="background-color:#41B5C2;margin-left: 80px; margin-right: 90px;">
    <h4 class="center-align" style="color: white;">Registrar Paciente</h4>
    <div class="container">
        <form action="<?php echo RUTA_URL ?>/paciente/registrar" method="POST">
            <div class="form-group">
                <label for="nombre" style="color: white;">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" class="form-control form-control-lg" minlength="3" required>
            </div>
            <div class="form-group">
                <label for="direccion" style="color: white;">Direccion: <sup>*</sup></label>
                <input type="text" name="direccion" class="form-control form-control-lg" minlength="3" required>
            </div>
            <div class="form-group">
                <label for="telefono" style="color: white;">Telefono: <sup>*</sup></label>
                <input type="text" name="telefono" class="form-control form-control-lg" pattern="^[0-9]{7,8}$" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" required>
            </div>
            <input type="submit" class="btn btn-success #01579b light-blue darken-4" value="Agregar Paciente">
        </form>
    </div>
    <br><br>
</div>
<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>