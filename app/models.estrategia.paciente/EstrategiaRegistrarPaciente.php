<?php

class EstrategiaRegistrarPaciente implements Estrategia
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ejecutar($parametros)
    {
        $this->db->query('INSERT INTO pacientes (nombre, direccion, telefono ) VALUES (:nombre, :direccion, :telefono) ');

        //Vincular valores
        $this->db->bind(':nombre'  , $parametros['nombre']);
        $this->db->bind(':direccion'   , $parametros['direccion']);
        $this->db->bind(':telefono'   , $parametros['telefono']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
