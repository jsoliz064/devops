<?php 

class HomeView{

    public function __construct(){}

    public function listar($datos = []) 
    {
        require_once VIEWS . 'home/listar.php';
    }
}

?>