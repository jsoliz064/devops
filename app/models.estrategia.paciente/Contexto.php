<?php
require "Estrategia.php";

class Contexto{
    private $estrategia;

    public function setEstrategia(Estrategia $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function ejecutarEstrategia($parametros) {
        return $this->estrategia->ejecutar($parametros);
    }
}
