<?php
echo "Controlador por defecto paginas sin entrar/";
class Paginas extends Controlador
{
    public function __construct()
    {
        
    }

    public function index()
    {
        echo "Controlador por defecto Paginas ingresado al index ";
    } 

    public function articulo($numero)
    {   echo $numero;
        $datos = [
            'nombre' => 'Hola a todos en render'
        ];
        $this->vista('paginas/informacion', $datos);
        
    }
}


?>