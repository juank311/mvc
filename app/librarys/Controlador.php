<?php
//Se encarga de poder cargar los modelos y las vistas 

class Controlador
{
    //cargar el modelo 
    public function modelo($modelo){
        //cargar modelo
        require_once('../app/models/'.$modelo.'.php');
        //instanciar el modelo
        return new $modelo();
    }

    //cargar el vista
    public function vista($vista, $datos = []){
        //chequear si el archibo vista existe 

        if (file_exists('../app/views/'.$vista.'.php')) {

            require_once('../app/views/'.$vista.'.php');
        } else 
        {
            //Si no existe mostrar un error
            die('la vista no existe');
        }
    }
}

?>