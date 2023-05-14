<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL; ?>/odontologo" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>

</div>



<div class="col s12 ">
    <div class="card" style="background-color:#41B5C2;padding-left: 60px;padding-right: 60px; padding-bottom: 30px; margin-left: 150px; margin-right: 150px">
        <div class="card-header" style="background-color:#41B5C2;">
            <h4 class="center-align" style="color: white;">Actualizar Odontologo</h4>
        </div>
        <div class="card-body">
            <form action="<?php echo RUTA_URL .'/odontologo/actualizar/' . $datos['id']; ?>" method="POST">
                <div class="form-group">
                    <label for="id" style="color: white;">ID: </label>
                    <input type="text" name="id" class="form-control form-control-lg" value="<?php echo $datos['id'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="nombre" style="color: white;">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" class="form-control form-control-lg" value="<?php echo $datos['nombre'] ?>">
                </div>
                <div class="form-group">
                    <label for="email" style="color: white;">Email: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg" value="<?php echo $datos['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="especialidad" style="color: white;">Especialidad: <sup>*</sup></label>
                    <input type="text" name="especialidad" class="form-control form-control-lg" value="<?php echo $datos['especialidad'] ?>">
                </div>
                <div class="form-group">
                    <label for="direccion" style="color: white;">Direccion: <sup>*</sup></label>
                    <input type="text" name="direccion" class="form-control form-control-lg" value="<?php echo $datos['direccion'] ?>">
                </div>
                <div class="form-group">
                    <label for="telefono" style="color: white;">Telefono: <sup>*</sup></label>
                    <input type="text" name="telefono" class="form-control form-control-lg" value="<?php echo $datos['telefono'] ?>">
                </div>
                <br>
                <input type="submit" class="btn btn-success #01579b light-blue darken-4" value="Actualizar">

            </form>
        </div>

    </div>
</div>

<?php require  dirname(dirname(__FILE__)) . '/init/footer.php'; ?>