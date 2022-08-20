<?php
echo "Controlador por defecto sin entrar";
class Paginas extends Controlador
{
    public function __construct()
    {
        
    }

    public function index()
    {
        echo "Controlador por defecto ingresado al index";
    } 

    public function articulo()
    {
        $datos = [
            'nombre' => 'Hola a todos en render'
        ];
        $this->vista('paginas/informacion', $datos);
        
    }
}


?>