<?php

require_once VIEWS . '/home/HomeView.php';

class HomeController {
    
    public $homeVista;

    public function __construct(){
        
        $this->homeVista = new HomeView();
    }

    public function listar()
    {
        return $this->homeVista->listar();
    }
}
?>


