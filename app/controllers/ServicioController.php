<?php

require_once MODELS . '/Servicio.php';
require_once MODELS . '/Categoria.php';
require_once VIEWS  . '/servicio/servicioView.php';


class ServicioController
{

    public $servicio;
    public $categoria;
    public $servicioView;

    public function __construct()
    {
        $this->servicio = new Servicio();
        $this->categoria = new Categoria();
        $this->servicioView  = new ServicioView();
    }

    public function obtenerCategoriaxServicio($servicios)
    {
        $datos = [];

        foreach ($servicios as $servicio) {
            $categoria = $this->categoria->obtenerCategoriaId($servicio->categoria_id);
            $datos += [$servicio->categoria_id => $categoria->nombre];
        }
        return $datos;
    }

    public function listar()
    {
        $servicios = $this->servicio->listarServicios();
        $categorias   = $this->obtenerCategoriaxServicio($servicios);
        $datos = [
            "servicios" =>  $servicios,
            "categorias" => $categorias,
        ];

        
        $this->servicioView->listarServicios($datos);
    }

    public function registrar()
    {
        $msgError = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'nombre'      => trim($_POST['nombre']),
                'descripcion' => trim($_POST['descripcion']),
                'categoria_id'  => trim($_POST['categoria_id'])
            ];

            if ($this->servicio->registrarServicio($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $categorias = $this->categoria->listarCategorias();
            $datos = [
                'categorias'    => $categorias,
                'msgError' => $msgError
            ];

            $this->servicioView->registrar($datos);
        }
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id' => $id,
                'nombre'      => trim($_POST['nombre']),
                'descripcion' => trim($_POST['descripcion']),
                'categoria_id'  => trim($_POST['categoria_id'])
            ];

            if ($this->servicio->actualizarServicio($datos)) {

                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $servicio = $this->servicio->obtenerServicioId($id);
            $categorias = $this->categoria->listarCategorias();

            $datos = [
                'servicio' => $servicio,
                'categorias' => $categorias,
            ];

            $this->servicioView->actualizar($datos);
        }
    }

    public function eliminar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = ['id' => $id];

            if ($this->servicio->eliminarServicio($datos)) {
                $this->renderizar();
            } else {
                die('Algo salió mal');
            }
        } else {
            $servicio = $this->servicio->obtenerServicioId($id);
            $categoria = $this->categoria->obtenerCategoriaId($servicio->categoria_id);
            $datos = [
                'servicio' => $servicio,
                'categoria' => $categoria,
            ];
            $this->servicioView->eliminar($datos);
        }
    }

    public function renderizar()
    {

        $servicios = $this->servicio->listarServicios();
        $datos = ['servicios' => $servicios];

        $this->actualizarVista('/servicio/listar', $datos);
    }

    public function actualizarVista($pagina, $datos = [])
    {
        header('location: ' . RUTA_URL . $pagina);
    }
}
