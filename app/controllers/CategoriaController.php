<?php 

require '../app/models/Categoria.php';
require '../app/views/categoria/categoriaView.php';

class CategoriaController {

    public $categoria;
    public $categoriaView;
 
    public function __construct()
    {
        $this->categoria = new Categoria();
        $this->categoriaView  = new CategoriaView();
    }
    
    public function listar()
    {
        $categorias = $this->categoria->listarCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->categoriaView->listar($datos);
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $datos = [
                'nombre'   => trim($_POST['nombre']),
                'descripcion'    => trim($_POST['descripcion']),
            ];

            if ($this->categoria->registrarCategoria($datos)) { 
                $this->renderizar();
            }else{
                die('Algo salió mal');
            }
        } else {
            $this->categoriaView->registrar();
        }
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $datos = [
                'id' => $id,
                'nombre'   => trim($_POST['nombre']),
                'descripcion'    => trim($_POST['descripcion']),
            ];

            if ($this->categoria->actualizarCategoria($datos)) {
                $this->renderizar();
            }else{
                die('Algo salió mal');
            }

        } else {
            $categoria = $this->categoria->obtenerCategoriaId($id);

            $datos = [
                'id' => $categoria->id,
                'nombre'   => $categoria->nombre,
                'descripcion'    => $categoria->descripcion,
            ];

            $this->categoriaView->actualizar($datos);
        }
    }

    public function eliminar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $datos = [ 'id' => $id ];
            
            if ($this->categoria->eliminarCategoria($datos)) {
                $this->renderizar();
            }else{
                die('Algo salió mal');
            }

        }else{
            $categoria = $this->categoria->obtenerCategoriaId($id);

            $datos = [
                'id' => $categoria->id,
                'nombre'   => $categoria->nombre,
                'descripcion'    => $categoria->descripcion,
            ];
    
            $this->categoriaView->eliminar($datos);
        }
    }

    public function renderizar()
    {
        $categorias = $this->categoria->listarCategorias();
        $datos = [ 'categorias' => $categorias ];

        $this->actualizarVista('/categoria/listar', $datos);
    }

    public function actualizarVista($pagina, $datos = [])
    {
        header('location: ' . RUTA_URL . $pagina);
    }
}

?>