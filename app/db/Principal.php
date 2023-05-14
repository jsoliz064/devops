
<?php


class Principal
{

    protected $controladorActual = 'HomeController';
    protected $metodoActual = 'listar';
    protected $parametros = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if ($url != null) {

            if (isset($url[0])) { //paso a otro controlador

                //Busco el controlador
                if (file_exists('../app/controllers/' . $this->controllerName($url[0]) . '.php')) {
                    //existe y asigno al nuevo controlador
                    $this->controladorActual = $this->controllerName($url[0]);

                 
                }
            }

            //Cargar el controlador, nuevo o anterior
            require '../app/controllers/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //Cargar los parametros

            if (isset($url[1])) {
                if (method_exists($this->controladorActual, $url[1])) {

                    //actualizamos el metodo
                    $this->metodoActual = $url[1];
                }
            }

            if (isset($url[2])) {
                $params[] = $url[2];
                $this->parametros = $url[2] ? array_values($params) : [];
                //   var_dump( $this->parametros );
            }

            //ESTA FUNCION, ejecuta el controlador con los parametros 
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }
    }

    public function getUrl()
    {


        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url_partes = explode("/", $url);
            return $url_partes;
        }
    }

    public function controllerName($controller)
    {
        return ucwords($controller) . 'Controller';
    }
}

?>

