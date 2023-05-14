<?php
require '../app/models/Cita.php';
require '../app/models/DetalleCita.php';
require '../app/models/Paciente.php';
require '../app/models/Servicio.php';
require '../app/models/Odontologo.php';
require_once VIEWS  . '/cita/citaView.php';
require '../app/patron.estado/Estado.php';
require '../app/patron.estado/Proceso.php';


class CitaController
{
    public $citaView;


    public $paciente;
    public $cita;

    public $servicio;
    public $odontologo;
    public $detalleCita;

    public $patronEstado;

    public function __construct()
    {
        $this->citaView = new CitaView();
        $this->paciente = new Paciente();
        $this->cita = new Cita();
        $this->servicio = new Servicio();
        $this->odontologo = new Odontologo();
        $this->detalleCita = new DetalleCita();
        $this->patronEstado = new Estado();
    }

    public function obtenerPacientexCita($citas)
    {
        $datos = [];

        foreach ($citas as $cita) {
            $paciente = $this->paciente->obtenerPacienteId($cita->paciente_id);
            $datos += [$cita->paciente_id => $paciente->nombre];
        }
        return $datos;
    }

    public function obtenerOdontologoxDetalleCita($detalles)
    {
        $datos = [];

        foreach ($detalles as $detalle) {
            $odontologo = $this->odontologo->obtenerOdontologoId($detalle->odontologo_id);
            $datos += [$detalle->odontologo_id => $odontologo->nombre];
        }
        return $datos;
    }

    public function obtenerServicioxDetalleCita($detalles)
    {
        $datos = [];

        foreach ($detalles as $detalle) {
            $servicio = $this->servicio->obtenerServicioId($detalle->servicio_id);
            $datos += [$detalle->servicio_id => $servicio->nombre];
        }
        return $datos;
    }

    public function listar()
    {
        $citas = $this->cita->listarCitas();
        $pacientes   = $this->obtenerPacientexCita($citas);
        $datos = [
            "citas" =>  $citas,
            "pacientes" => $pacientes,
        ];


        $this->citaView->listarCitas($datos);
    }




    public function registrar()
    {
        $msgError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'fecha'   => trim($_POST['fecha']),
                'descripcion'    => trim($_POST['descripcion']),
                'estado' => 'P',
                'paciente_id' => trim($_POST['paciente_id']),
            ];

            if (!empty($_POST['detalleCita'])) {
                if ($this->cita->registrarCita($datos)) {

                    $cita = $this->cita->ObtenerUltimaCita();
                    $detallesCita = $_POST['detalleCita'];

                    foreach ($detallesCita as $detalle) {
                        $datos = [
                            'hora_entrada' => $detalle['hora_entrada'],
                            'hora_salida' => $detalle['hora_salida'],
                            'servicio_id' => $detalle['servicio_id'],
                            'cita_id' => $cita->id,
                            'odontologo_id' => $detalle['odontologo_id'],
                        ];
                        $this->detalleCita->registrarDetalleCita($datos);
                    }

                    return $this->renderizar();
                }
            } else {
                $msgError = "No Ingreso Ningun Detalle";
            }
        } else {
            $pacientes = $this->paciente->listarPacientes();
            $servicios = $this->servicio->listarServicios();
            $odontologos = $this->odontologo->listarOdontologos();

            $datos = [
                'servicios'    => $servicios,
                'pacientes'    => $pacientes,
                'odontologos'    => $odontologos,
                'msgError' => $msgError
            ];

            $this->citaView->registrar($datos);
        }
    }

    public function verDetalle($id)
    {
        $cita = $this->cita->obtenerCitaId($id);
        $paciente = $this->paciente->obtenerPacienteId($cita->paciente_id);
        $detallesCita = $this->detalleCita->listarDetallesxCita($id);
        $odontologos   = $this->obtenerOdontologoxDetalleCita($detallesCita);
        $servicios   = $this->obtenerServicioxDetalleCita($detallesCita);

        $datos = [
            'cita' => $cita,
            'paciente' => $paciente,
            'odontologos' => $odontologos,
            'servicios' => $servicios,
            'detallesCita' => $detallesCita,
        ];

        $this->citaView->verDetalleCita($datos);
    }

    public function eliminar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cita = $this->cita->obtenerCitaId($id);
            $detalleCita = $this->detalleCita->listarDetallesxCita($id);
            foreach ($detalleCita as $detalle) {
                $datos = [
                    "cita_id" => ($detalle->cita_id),
                ];
                $this->detalleCita->eliminarDetalleCita($datos);
            }

            $datos = ['id' => $id];
            if ($this->cita->eliminarCita($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $cita = $this->cita->obtenerCitaId($id);
            $paciente = $this->paciente->obtenerPacienteId($cita->paciente_id);
            $detallesCita = $this->detalleCita->listarDetallesxCita($id);
            $odontologos   = $this->obtenerOdontologoxDetalleCita($detallesCita);
            $servicios   = $this->obtenerServicioxDetalleCita($detallesCita);

            $datos = [
                'cita' => $cita,
                'paciente' => $paciente,
                'odontologos' => $odontologos,
                'servicios' => $servicios,
                'detallesCita' => $detallesCita,
            ];

            $this->citaView->eliminar($datos);
        }
    }

    public function actualizarEstado($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cita = $this->cita->obtenerCitaId($id);
            $estado = $_POST["group3"];
            switch ($estado) {
                case 'Pendiente':
                    $this->patronEstado->estarpendiente($this->patronEstado);
                    break;
                case 'En Proceso':
                    $this->patronEstado->procesar($this->patronEstado);
                    break;
                case 'Concluido':
                    $this->patronEstado->concluir($this->patronEstado);
                    break;
                case 'NoConcluido':
                    $this->patronEstado->sinconcluir( $this->patronEstado);
                    break;
            }
            $estado = $this->patronEstado->getNombre();
            $datos=[
                "id"=>$cita->id,
                "estado"=>$estado,
            ];
            if ($this->cita->actualizarCita($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        }
    }

    public function renderizar()
    {

        $citas = $this->cita->listarCitas();
        $pacientes   = $this->obtenerPacientexCita($citas);
        $datos = [
            "citas" =>  $citas,
            "pacientes" => $pacientes,
        ];

        $this->actualizarVista('/cita/listarCitas', $datos);
    }

    public function actualizarVista($pagina, $datos = [])
    {
        header('location: ' . RUTA_URL . $pagina);
    }
}
