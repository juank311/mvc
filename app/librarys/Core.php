<?php
/*  traer la url ingresada en en el vanegador 

    1- Controlador
    2- Metodo 
    3- Parametro

    Ejemplo:
 */

class Core
{
    protected $controladorActual = 'Paginas';
    protected $metodoActual = 'index';
    protected $parametros  = [];

    //constructor para que se ejecute la clase Core
    public function __construct()
    {
        $url = $this->getUrl();
        //print_r($this->getUrl());

        //CONFIGURACION DEL CONTROLADOR
        //Si existe el archivo en el controlador
        if (is_array($url)) 
        {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) 
            {
                //si existe se setea como controlador por defecto.
                $this->controladorActual = ucwords($url[0]);
                //unset indice
                unset($url[0]);
            }
            //si no existe requerir el controlador por defecto e instanciar su clase.
            require_once '../app/controllers/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;
        }
        //CONFIGURACION DEL METODO
        if (isset($url[1])) {
            //Segunda parte de la URL metodo y parametros 
            if (method_exists($this->controladorActual, $url[1])) 
            {
                # se revisa el metodo 
                $this->metodoActual = $url[1];
                //unset indice
                unset($url[1]);
            }
            echo $this->metodoActual. "/";
        }
        //CONFIGURACION DE LOS PARAMETROS

        if ($this->parametros = $url) 
        {
            $this->parametros = array_values($url);
             //llamar a callback con parametros array 
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }else 
        {
            $this->parametros = [];
        }
    }

    //funcion, recoge la url
    public function getUrl()
    {   //si esta seteada 
        if (isset($_GET['url'])) {
            //la explota y convierte en un Array Assoc
            $separador = '/';
            //limpia 
            $url = rtrim($_GET['url'], $separador);
            //recibe filtro de url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode($separador, $url);
            return $url;
            //echo $url = $_GET['url'];  
        }
    }
}
