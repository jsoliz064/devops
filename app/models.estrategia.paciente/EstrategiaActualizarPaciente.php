<?php


class EstrategiaActualizarPaciente implements Estrategia
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ejecutar($parametros)
    {

        
        $this->db->query('UPDATE pacientes SET nombre = :nombre, direccion = :direccion, telefono = :telefono WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $parametros['id']);
        $this->db->bind(':nombre', $parametros['nombre']);
        $this->db->bind(':direccion', $parametros['direccion']);
        $this->db->bind(':telefono', $parametros['telefono']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
