<?php

require '../app/models/Paciente.php';
require '../app/views/paciente/pacienteView.php';

require '../app/models.estrategia.paciente/Contexto.php';
require '../app/models.estrategia.paciente/EstrategiaActualizarPaciente.php';
require '../app/models.estrategia.paciente/EstrategiaEliminarPaciente.php';
require '../app/models.estrategia.paciente/EstrategiaRegistrarPaciente.php';

class PacienteController
{

    public $paciente;
    public $pacienteView;
    public $contexto;

    public function __construct()
    {
        $this->paciente = new Paciente();
        $this->contexto = new Contexto();
        $this->pacienteView  = new pacienteView();
    }

    public function listar()
    {
        $pacientes = $this->paciente->listarPacientes();
        $datos = [
            'pacientes' => $pacientes
        ];
        $this->pacienteView->listar($datos);
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'nombre'   => trim($_POST['nombre']),
                'direccion'    => trim($_POST['direccion']),
                'telefono'    => trim($_POST['telefono']),
            ];

            //Seteamos la estrategia para Registrar
            $this->contexto->setEstrategia(new EstrategiaRegistrarPaciente());

            //Ejecutamos la estrategia
            if ($this->contexto->ejecutarEstrategia($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $this->pacienteView->registrar();
        }
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id' => $id,
                'nombre'   => trim($_POST['nombre']),
                'direccion'    => trim($_POST['direccion']),
                'telefono'    => trim($_POST['telefono']),
            ];
            //Seteamos la estrategia para Actualizar
            $this->contexto->setEstrategia(new EstrategiaActualizarPaciente());

            //Ejecutamos la estrategia
            if ($this->contexto->ejecutarEstrategia($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $paciente = $this->paciente->obtenerPacienteId($id);

            $datos = [
                'id' => $paciente->id,
                'nombre'   => $paciente->nombre,
                'direccion'    => $paciente->direccion,
                'telefono'    => $paciente->telefono,
            ];

            $this->pacienteView->actualizar($datos);
        }
    }

    public function eliminar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = ['id' => $id];

            //Seteamos la estrategia para Actualizar
            $this->contexto->setEstrategia(new EstrategiaEliminarPaciente());

            //Ejecutamos la estrategia
            if ($this->contexto->ejecutarEstrategia($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $paciente = $this->paciente->obtenerPacienteId($id);

            $datos = [
                'id' => $paciente->id,
                'nombre'   => $paciente->nombre,
                'direccion'    => $paciente->direccion,
                'telefono'    => $paciente->telefono,
            ];

            $this->pacienteView->eliminar($datos);
        }
    }

    public function renderizar()
    {
        $pacientes = $this->paciente->listarPacientes();
        $datos = ['pacientes' => $pacientes];

        $this->actualizarVista('/paciente/listar', $datos);
    }

    public function actualizarVista($pagina, $datos = [])
    {
        header('location: ' . RUTA_URL . $pagina);
    }
}
