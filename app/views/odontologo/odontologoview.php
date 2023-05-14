<?php 

class OdontologoView {

    public function __construct() {}
    
    public function listar($datos)
    {
        require_once VIEWS . 'odontologo/listar.php';
    }
    
    public function registrar($datos = [])
    {
        require_once VIEWS . 'odontologo/registrar.php';
    }
    
    public function actualizar($datos = [])
    {
        require_once VIEWS . 'odontologo/actualizar.php';
    }
    
    public function eliminar($datos = [])
    {
        require_once VIEWS . 'odontologo/eliminar.php';
    }
}

?>