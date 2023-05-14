<?php 

class Odontologo{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarOdontologos()
    {
        $this->db->query("SELECT * FROM odontologos");
        return $this->db->registros();
    }

    public function obtenerOdontologoId($id)
    {
        $this->db->query('SELECT * FROM odontologos WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }


    
    public function registrarOdontologo($datos)
    {
        $this->db->query('INSERT INTO odontologos (nombre, email, especialidad, direccion, telefono ) VALUES (:nombre, :email, :especialidad, :direccion, :telefono) ');

        //Vincular valores
        $this->db->bind(':nombre'  , $datos['nombre']);
        $this->db->bind(':email'   , $datos['email']);
        $this->db->bind(':especialidad'   , $datos['especialidad']);
        $this->db->bind(':direccion'   , $datos['direccion']);
        $this->db->bind(':telefono'   , $datos['telefono']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
    public function actualizarOdontologo($datos)
    {
        $this->db->query('UPDATE odontologos SET nombre = :nombre, email = :email, especialidad = :especialidad, direccion = :direccion, telefono = :telefono WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre'  , $datos['nombre']);
        $this->db->bind(':email'   , $datos['email']);
        $this->db->bind(':especialidad'   , $datos['especialidad']);
        $this->db->bind(':direccion'   , $datos['direccion']);
        $this->db->bind(':telefono'   , $datos['telefono']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarOdontologo($datos)
    {
        $this->db->query('DELETE FROM odontologos WHERE id = :id');

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
