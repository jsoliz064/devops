
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="id=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" class="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <title><?php echo NOMBRE_SITIO ?></title>
    <style>
        body{
            background-image: url('https://img.freepik.com/vector-gratis/paciente-sentado-silla-medica-visita-o-tratamiento-aislado-ilustracion-vectorial-plana-dentista-dibujos-animados-trabajando-gabinete-diagnostico-concepto-clinica-dental-estomatologia_74855-13192.jpg?w=2000');
            background-size: 50% 50% 50%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-toggleable-lg navbar-inverse bg-inverse mb-3">
        <!--add color here -->

        <a href="#" class="navbar-brand"> <?php echo NOMBRE_SITIO ?> </a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item float-right">
                    <a class='nav-link dropdown-trigger' href="<?php echo RUTA_URL ?>/categoria/listarCategoria" data-target='dropdown1'>Categorias</a>
                </li>
                <li class="nav-item float-right">
                    <a class='nav-link dropdown-trigger'href="<?php echo RUTA_URL ?>/servicio/listarServicio" data-target='dropdown2'>Servicios</a>
                </li>
                <li class="nav-item float-right">
                    <a class='nav-link dropdown-trigger' href="<?php echo RUTA_URL ?>/odontologo/listarOdontologo" data-target='dropdown3'>Odontologos</a>
                </li>
                <li class="nav-item float-right">
                    <a class='nav-link dropdown-trigger' href="<?php echo RUTA_URL ?>/paciente/listarPaciente" data-target='dropdown4'>Pacientes</a>
                </li>
                <li class="nav-item float-right">
                    <a class='nav-link dropdown-trigger' href="<?php echo RUTA_URL ?>/cita/listarCita" data-target='dropdown5'>Citas</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">