<?php 

class CitaView {

    public function __construct() {}
    
    public function listarCitas($datos)
    {
        require_once VIEWS . 'cita/listar.php';
    }
    
    public function registrar($datos = [])
    {
        require_once VIEWS . 'cita/registrar.php';
    }

    public function verDetalleCita($datos = [])
    {
        require_once VIEWS . 'cita/detalleCita.php';
    }
    
    public function actualizar($datos = [])
    {
        require_once VIEWS . 'cita/actualizar.php';
    }
    
    public function eliminar($datos = [])
    {
        require_once VIEWS . 'cita/eliminar.php';
    }
}

?>