<?php 

class Paciente{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarPacientes()
    {
        $this->db->query("SELECT * FROM pacientes");
        return $this->db->registros();
    }

    public function obtenerPacienteId($id)
    {
        $this->db->query('SELECT * FROM pacientes WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }


    
    public function registrarPaciente($datos)
    {
        $this->db->query('INSERT INTO pacientes (nombre, direccion, telefono ) VALUES (:nombre, :direccion, :telefono) ');

        //Vincular valores
        $this->db->bind(':nombre'  , $datos['nombre']);
        $this->db->bind(':direccion'   , $datos['direccion']);
        $this->db->bind(':telefono'   , $datos['telefono']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
    public function actualizarPaciente($datos)
    {
        $this->db->query('UPDATE pacientes SET nombre = :nombre, direccion = :direccion, telefono = :telefono WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre'  , $datos['nombre']);
        $this->db->bind(':direccion'   , $datos['direccion']);
        $this->db->bind(':telefono'   , $datos['telefono']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarPaciente($datos)
    {
        $this->db->query('DELETE FROM pacientes WHERE id = :id');

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
