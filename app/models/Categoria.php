<?php 

class Categoria{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarCategorias()
    {
        $this->db->query("SELECT * FROM categorias");
        return $this->db->registros();
    }

    public function obtenerCategoriaId($id)
    {
        $this->db->query('SELECT * FROM categorias WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }


    
    public function registrarCategoria($datos)
    {
        $this->db->query('INSERT INTO categorias (id, nombre, descripcion ) VALUES (:id, :nombre, :descripcion) ');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre'  , $datos['nombre']);
        $this->db->bind(':descripcion'   , $datos['descripcion']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
    public function actualizarCategoria($datos)
    {
        $this->db->query('UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':nombre'  , $datos['nombre']);
        $this->db->bind(':descripcion'   , $datos['descripcion']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCategoria($datos)
    {
        $this->db->query('DELETE FROM categorias WHERE id = :id');

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
