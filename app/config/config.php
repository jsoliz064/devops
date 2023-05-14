<?php

define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_NOMBRE', 'devops');

//Ruta de la App
define('RUTA_APP', dirname(dirname(__FILE__)));

$base='Proyecto-final-DDE-V1E1-Modulo-1';
define('RUTA_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.$base);

define('NOMBRE_SITIO', $base);

define('VIEWS', '../app/views/');
define('CONTROLLERS', '../app/controllers/');
define('MODELS', '../app/models/');
