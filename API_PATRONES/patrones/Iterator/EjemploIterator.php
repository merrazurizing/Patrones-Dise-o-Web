<?php

namespace Iterator;

use Exception;

require_once 'models/Catalogo.class.php';
require_once 'models/Vehiculo.class.php';
require_once 'models/Iterador.class.php';

class EjemploIterator
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $catalogo = new Catalogo();
            $catalogo->agrega(new Vehiculo('vehiculo barato'));
            $catalogo->agrega(new Vehiculo('pequeño vehiculo barato'));
            $catalogo->agrega(new Vehiculo('vehiculo de gran calidad'));
            $iterador = $catalogo->busqueda('barato');
            
            $iterador->inicio();
            $vehiculo = $iterador->item();
            $r=[];
            while (isset($vehiculo))
            {
                $r[]=$vehiculo->muestra();
                $iterador->siguiente();
                $vehiculo = $iterador->item();
            }

         
            
        
           
          
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
