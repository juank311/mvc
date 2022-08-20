<?php
class Ejemplo extends Controlador
{
    public function __construct()
    {
        $this->vista('paginas/inicio');
         
    }

/*     public function index()
    {
        
    } */

    public function articulo($numero)
    {
            echo $numero;
    }
}
?>