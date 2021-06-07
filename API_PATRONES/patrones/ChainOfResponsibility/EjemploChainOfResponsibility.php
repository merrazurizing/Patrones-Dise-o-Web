<?php

namespace ChainOfResponsibility;

use Exception;

require_once 'models/Vehiculo.class.php';
require_once 'models/Modelo.class.php';
require_once 'models/Marca.class.php';

class EjemploChainOfResponsibility
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $vehiculo1 = new Vehiculo('Auto++ KT500 Vehiculo de ocasion en buen estado ');
            $modelo1 = new Modelo('KT400', 'El vehiculo amplio y confortable');
           
            $vehiculo2 = new Vehiculo();
            $vehiculo2->setSiguiente($modelo1);

            $marca1 = new Marca('Auto++', 'La marca de vehiculos', 'de grand calidad');
            $modelo2 = new Modelo('KT700');
            $modelo2->setSiguiente($marca1);

            $vehiculo3 = new Vehiculo();
            $vehiculo3->setSiguiente($modelo2);
        
            $vehiculo4 = new Vehiculo();
           $r = array('daDescripcion1' => $vehiculo1->daDescripcion(),
                'daDescripcion2' => $vehiculo2->daDescripcion(),
                'daDescripcion3' => $vehiculo3->daDescripcion(),
                'daDescripcion4' => $vehiculo4->daDescripcion()
            );


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
