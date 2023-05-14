<?php 

class ServicioView {

    public function listarServicios($datos)
    {
        require_once VIEWS . 'servicio/listar.php';
    }

    public function registrar($datos)
    {
        require_once VIEWS . 'servicio/registrar.php';
    }
    
    public function actualizar($datos)
    {
        require_once VIEWS . 'servicio/actualizar.php';
    }

    public function eliminar($datos)
    {
        require_once VIEWS . 'servicio/eliminar.php';
    }

}

?>