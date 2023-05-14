<?php require  dirname(dirname(__FILE__)) . '/init/header.php'; ?>

<div class="row s12">
    <div class="col s6">
        <a href="<?php echo RUTA_URL ?>/cita/cita/listarcita" class="btn btn-#1e88e5 blue darken-1"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
<!-- <h4 class="center-align">Registrar Cita</h4> -->
<form action="<?php echo RUTA_URL ?>/cita/registrar" method="POST">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="background-color:#41B5C2;">
                <div class="card-header" style="text-align: center;background-color:#41B5C2;">
                    <h5 style="color: white;">Registro de Cita</h5>
                </div>
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha" style="color: white;">Fecha: <sup>*</sup></label>
                                <input type="date" name="fecha" class="form-control ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcion" style="color: white;">Descripcion: <sup>*</sup></label>
                                <input type="text" name="descripcion" class="form-control ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: white;">Seleccione el Paciente:<sup>*</sup></label> <br><br>
                                <select name="paciente_id" id="paciente_id" class="form-control" style="background-color:#41B5C2;">
                                    <?php foreach ($datos['pacientes'] as $paciente) : ?>
                                        <option value="<?php echo $paciente->id; ?>"><?php echo $paciente->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer" style="background-color:#41B5C2;">
                    <button type="submit" class="btn red">Registrar Cita</button>
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="card" style="background-color:#95CCD8;">
                <div class="card-body" style="background-color:#95CCD8;">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hora_entrada" style="color: white;">Hora de Entrada: <sup>*</sup></label>
                                <input type="time" id="hora_entrada" name="hora_entrada" class="form-control ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hora_salida" style="color: white;">Hora de Salida: <sup>*</sup></label>
                                <input type="time" id="hora_salida" name="hora_salida" class="form-control ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: white;">Asigne el Odontologo Encargado:<sup>*</sup></label> <br><br>
                                <select name="odontologo_id" id="odontologo_id" class="form-control" style="background-color:#95CCD8;">
                                    <?php foreach ($datos['odontologos'] as $odontologo) : ?>
                                        <option value="<?php echo $odontologo->id; ?>"><?php echo $odontologo->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: white;">Seleccione el Servicio:<sup>*</sup></label> <br><br>
                                <select name="servicio_id" id="servicio_id" class="form-control" style="background-color:#95CCD8;">
                                    <?php foreach ($datos['servicios'] as $servicio) : ?>
                                        <option value="<?php echo $servicio->id; ?>"><?php echo $servicio->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br><br>
                                <button id="agregar_detalle" type="button" class="btn blue" onclick="agregarDetalle()">Agregar Detalle</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3" id="detalles">
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="card" style="background-color:#dddd;">
                <div class="card-header" style="text-align: center;background-color:#dddd;">
                    <h5 >Detalles de la Cita</h5>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    var i = 0;

    function agregarDetalle() {
        let hora_entrada = document.getElementById('hora_entrada');
        let hora_salida = document.getElementById('hora_salida');
        let odontologo_id = document.getElementById('odontologo_id');
        let servicio_id = document.getElementById('servicio_id');
        
        row = '<tr><td style="text-align: center;">' + hora_entrada.value +
            '</td> <td style="text-align: center;">' + hora_salida.value +
            '</td> <td style="text-align: center;">' + odontologo_id.options[odontologo_id.selectedIndex].text +
            '</td> <td style="text-align: center;">' + servicio_id.options[servicio_id.selectedIndex].text + '</td> </tr>';

        $("#lista-alquiler").append(row);
        inputForm =
            '<input type="hidden" name="detalleCita[' + i + '][hora_entrada]" value="' + hora_entrada.value + '">' +
            '<input type="hidden" name="detalleCita[' + i + '][hora_salida]" value="' + hora_salida.value + '">' +
            '<input type="hidden" name="detalleCita[' + i + '][odontologo_id]" value="' + odontologo_id.value + '">' +
            '<input type="hidden" name="detalleCita[' + i + '][servicio_id]" value="' + servicio_id.value + '">';
        $("#detalles").append(inputForm);
        i = i + 1;
    }
</script>

<?php require dirname(dirname(__FILE__)) . '/init/footer.php'; ?>