<?php

class EstrategiaEliminarPaciente implements Estrategia
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ejecutar($parametros)
    {
        $this->db->query('DELETE FROM pacientes WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $parametros['id']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
