<?php


class Proceso implements State
{


    public function concluir(Estado $estado)
    {
        $estado->setEstado(new Concluido());
        $estado->setMensaje("Las citas programadas se han concluido");
        $estado->setNombre("C");
    }

    public function sinconcluir(Estado $estado)
    {
        $estado->setEstado(new NoConcluido());
        $estado->setMensaje("Las citas programadas no se pudieron concluido");
        $estado->setNombre("S");
    }

    public function estarpendiente(Estado $estado)
    {
        $estado->setMensaje("Las citas programadas estan pendientes");
    }

    public function procesar(Estado $estado)
    {
        $estado->setMensaje("El traje estara en Revision");
    }
}
