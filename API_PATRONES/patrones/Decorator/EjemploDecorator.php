<?php

namespace Decorator;

use Exception;

require_once 'models/VistaVehiculo.class.php';
require_once 'models/ModeloDecorador.class.php';
require_once 'models/MarcaDecorador.class.php';

class EjemploDecorator
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $vistaVehiculo = new VistaVehiculo();
        
            $modeloDecorador = new ModeloDecorador($vistaVehiculo);
  
            $marcaDecorador = new MarcaDecorador($modeloDecorador);
    


            $r= $marcaDecorador->muestra();
            
        
           
          
            $respuesta = array('Estado' => "success",
                'Response' => $r);
            return $respuesta;
        } catch (Exception $e) {
            $respuesta = array('Estado' => "Error",
                'Response' => $e->getMessage());
            return $respuesta;
        }
    }

}
