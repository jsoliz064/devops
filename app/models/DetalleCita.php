<?php 

class DetalleCita{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarDetalles()
    {
        $this->db->query("SELECT * FROM detalles_cita");
        return $this->db->registros();
    }

    public function listarDetallesxCita($id)
    {
        $this->db->query("SELECT * FROM detalles_cita WHERE cita_id =:cita_id");
        $this->db->bind(':cita_id', $id);
        return $this->db->registros();
    }

    public function obtenerDetalleCitaId($id)
    {
        $this->db->query('SELECT * FROM detalles_cita WHERE id = :id ');

        //Vincular valores
        $this->db->bind(':id', $id);
        $fila = $this->db->registro();
        return $fila;
    }


    
    public function registrarDetalleCita($datos)
    {
        $this->db->query('INSERT INTO detalles_cita (hora_entrada, hora_salida, servicio_id, cita_id, odontologo_id ) VALUES (:hora_entrada, :hora_salida, :servicio_id, :cita_id, :odontologo_id) ');

        //Vincular valores
        $this->db->bind(':hora_entrada'  , $datos['hora_entrada']);
        $this->db->bind(':hora_salida'  , $datos['hora_salida']);
        $this->db->bind(':servicio_id'  , $datos['servicio_id']);
        $this->db->bind(':cita_id'   , $datos['cita_id']);
        $this->db->bind(':odontologo_id'   , $datos['odontologo_id']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
    public function actualizarDetalleCita($datos)
    {
        $this->db->query('UPDATE detalles_cita SET hora_entrada = :hora_entrada, hora_salida = :hora_salida WHERE id = :id');

        //Vincular valores
        $this->db->bind(':id', $datos['id']);
        $this->db->bind(':hora_entrada'  , $datos['hora_entrada']);
        $this->db->bind(':hora_salida'   , $datos['hora_salida']);
    
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarDetalleCita($datos)
    {
        $this->db->query('DELETE FROM detalles_cita WHERE cita_id = :cita_id');
        //Vincular valores
        $this->db->bind(':cita_id', $datos['cita_id']);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
