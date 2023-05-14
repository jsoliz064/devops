<?php
require "Pendiente.php";


class Estado
{

    private State $estado;
    private String $nombre;
    private String $mensaje;

    public function __construct()
    {
        $this->nombre = "P";
        $this->estado = new Pendiente();
    }

    public function Estado(String $nombre)
    {
        switch ($nombre) {
            case "P":
                $this->estado = new Pendiente();
                break;
            case "C":
                $this->estado = new Concluido();
                break;
            case "E":
                $this->estado = new Proceso();
                break;
            case "S":
                $this->estado = new NoConcluido();
                break;
        }
        $this->nombre = $nombre;
    }

    public function estarpendiente(Estado $state)
    {
        $this->estado->estarpendiente($state);
    }

    public function procesar(Estado $state)
    {
        $this->estado->procesar($state);
    }

    public function concluir(Estado $state)
    {
        $this->estado->concluir($state);
    }

    public function sinconcluir(Estado $state)
    {
        $this->estado->sinconcluir($state);
    }



    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado(State $estado)
    {
        $this->estado = $estado;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre(String $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje(String $mensaje)
    {
        $this->mensaje = $mensaje;
    }
}
