<?php

class Cita
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarCitas()
    {
        $this->db->query("SELECT * FROM citas");
        return $this->db->registros();
    }

    public function obtenerCitaId($id)
    {
        $this->db->query('SELECT * FROM citas WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }

    public function ObtenerUltimaCita()
    {
        $this->db->query('SELECT c.* FROM citas c WHERE id = (SELECT MAX(id) FROM citas)');
        $cita = $this->db->registro();
        return $cita;
    }



    public function registrarCita($datos)
    {
        $this->db->query('INSERT INTO citas (fecha, descripcion, estado, paciente_id ) VALUES (:fecha, :descripcion, :estado, :paciente_id) ');

        //Vincular valores
        $this->db->bind(':fecha', $datos['fecha']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':estado', $datos['estado']);
        $this->db->bind(':paciente_id', $datos['paciente_id']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarCita($datos)
    {
        $this->db->query('UPDATE citas SET estado = :estado WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':estado', $datos['estado']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCita($datos)
    {
        $this->db->query('DELETE FROM citas WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
