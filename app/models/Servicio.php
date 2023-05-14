<?php 

class Servicio{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarServicios()
    {
        $this->db->query("SELECT * FROM servicios");
        return $this->db->registros();
    }
    
    public function listarServiciosIdCategoria($datos)
    {
        $this->db->query("SELECT * FROM servicios WHERE categoria_id = :id");

        $this->db->bind(':id', $datos['categoria_id']);
        return $this->db->registros();
    }


    public function obtenerServicioId($id)
    {
        $this->db->query('SELECT * FROM servicios WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }
    
    public function registrarServicio($datos)
    {
        $this->db->query('INSERT INTO servicios (nombre, descripcion, categoria_id) VALUES (:nombre, :descripcion, :categoria_id) ');

        //Vincular valores
        $this->db->bind(':nombre',      $datos['nombre']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':categoria_id',      $datos['categoria_id']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
    public function actualizarServicio($datos)
    {
        $this->db->query('UPDATE servicios SET nombre = :nombre, descripcion = :descripcion, categoria_id = :categoria_id WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id',          $datos['id']);
        $this->db->bind(':nombre',      $datos['nombre']);
        $this->db->bind(':descripcion', $datos['descripcion']);
        $this->db->bind(':categoria_id', $datos['categoria_id']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarServicio($datos)
    {
        $this->db->query('DELETE FROM servicios WHERE id = :id');

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

?>