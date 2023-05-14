<?php 

class PacienteView {

    public function __construct() {}
    
    public function listar($datos)
    {
        require_once VIEWS . 'paciente/listar.php';
    }
    
    public function registrar($datos = [])
    {
        require_once VIEWS . 'paciente/registrar.php';
    }
    
    public function actualizar($datos = [])
    {
        require_once VIEWS . 'paciente/actualizar.php';
    }
    
    public function eliminar($datos = [])
    {
        require_once VIEWS . 'paciente/eliminar.php';
    }
}

?>