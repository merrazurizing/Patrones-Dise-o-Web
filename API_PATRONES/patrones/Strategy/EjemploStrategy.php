<?php

namespace Strategy;

use Exception;

require_once 'models/VistaCatalogo.class.php';
require_once 'models/DibujaTresVehiculosLinea.class.php';
require_once 'models/DibujaUnVehiculoLinea.class.php';

class EjemploStrategy
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          
            $r=Array();

            $vistaCatalogo1 = new VistaCatalogo(new DibujaTresVehiculosLinea());
            $r[]= Array("DibujaTresVehiculosLinea"=>$vistaCatalogo1->dibuja());
            
            $vistaCatalogo2 = new VistaCatalogo(new DibujaUnVehiculoLinea());
            
            $r[]= Array("DibujaUnVehiculoLinea"=>$vistaCatalogo2->dibuja());
            
        
           
          
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
