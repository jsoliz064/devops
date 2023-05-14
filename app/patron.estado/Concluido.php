<?php

class Concluido implements State
{


    public function concluir(Estado $estado)
    {
        $estado->setMensaje("Las citas programadas se han concluido");
    }

    public function sinconcluir(Estado $estado)
    {
        $estado->setMensaje("Las citas programadas no se pudieron concluido");
    }

    public function estarpendiente(Estado $estado)
    {
        $estado->setMensaje("Las citas programadas estan pendientes");
    }

    public function procesar(Estado $estado)
    {
        $estado->setMensaje("Las citas programadas estan siendo procesadas");
    }
}
