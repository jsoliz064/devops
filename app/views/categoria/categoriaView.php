<?php 
 
class CategoriaView {

    public function __construct() {}
    
    public function listar($datos)
    {
        require_once VIEWS . 'categoria/listar.php';
    }
    
    public function registrar()
    {
        require_once VIEWS . 'categoria/registrar.php';
    }
    
    public function actualizar($datos = [])
    {
        require_once VIEWS . 'categoria/actualizar.php';
    }
    
    public function eliminar($datos = [])
    {
        require_once VIEWS . 'categoria/eliminar.php';
    }
}

?>