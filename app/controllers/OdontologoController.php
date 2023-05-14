<?php 

require '../app/models/Odontologo.php';

require '../app/views/odontologo/odontologoView.php';

class OdontologoController {

    public $odontologo;
    public $odontologoView;


    public function __construct()
    {
        $this->odontologo = new Odontologo();
        $this->odontologoView  = new OdontologoView();
    }
    
    public function listar()
    {
        $odontologos = $this->odontologo->listarOdontologos();
        $datos = [
            'odontologos' => $odontologos
        ];
        $this->odontologoView->listar($datos);
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $datos = [
                'nombre'   => trim($_POST['nombre']),
                'email'    => trim($_POST['email']),
                'especialidad'    => trim($_POST['especialidad']),
                'direccion'    => trim($_POST['direccion']),
                'telefono'    => trim($_POST['telefono']),
            ];

            if ($this->odontologo->registrarOdontologo($datos)) { 
                $this->renderizar();
            }else{
                die('Algo salió mal');
            }
        } else {
            $this->odontologoView->registrar();
        }
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $datos = [
                'id' => $id,
                'nombre'   => trim($_POST['nombre']),
                'email'    => trim($_POST['email']),
                'especialidad'    => trim($_POST['especialidad']),
                'direccion'    => trim($_POST['direccion']),
                'telefono'    => trim($_POST['telefono']),
            ];

            if ($this->odontologo->actualizarOdontologo($datos)) {
                $this->renderizar();
            }else{
                die('Algo salió mal');
            }

        } else {
            $odontologo = $this->odontologo->obtenerOdontologoId($id);

            $datos = [
                'id' => $odontologo->id,
                'nombre'   => $odontologo->nombre,
                'email'    => $odontologo->email,
                'especialidad'    => $odontologo->especialidad,
                'direccion'    => $odontologo->direccion,
                'telefono'    => $odontologo->telefono,
            ];

            $this->odontologoView->actualizar($datos);
        }
    }

    public function eliminar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $datos = [ 'id' => $id ];
            
            if ($this->odontologo->eliminarOdontologo($datos)) {
                $this->renderizar();
            }else{
                die('Algo salió mal');
            }

        }else{
            $odontologo = $this->odontologo->obtenerOdontologoId($id);

            $datos = [
                'id' => $odontologo->id,
                'nombre'   => $odontologo->nombre,
                'email'    => $odontologo->email,
                'especialidad'    => $odontologo->especialidad,
                'direccion'    => $odontologo->direccion,
                'telefono'    => $odontologo->telefono,
            ];
    
            $this->odontologoView->eliminar($datos);
        }
    }

    public function renderizar()
    {
        $odontologos = $this->odontologo->listarOdontologos();
        $datos = [ 'odontologos' => $odontologos ];

        $this->actualizarVista('/odontologo/listar', $datos);
    }

    public function actualizarVista($pagina, $datos = [])
    {
        header('location: ' . RUTA_URL . $pagina);
    }
}
