<?php

namespace Observer;

use Exception;

require_once 'models/Vehiculo.class.php';
require_once 'models/VistaVehiculo.class.php';


class EjemploObserver
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $vehiculo = new Vehiculo();
            $vehiculo->setDescripcion('Veh�culo barato');
            $vehiculo->setPrecio(5000.0);
            
            $vistaVehiculo = new VistaVehiculo('Observador 1', $vehiculo);
            $r=$vistaVehiculo->redibuja();
            $vehiculo->setPrecio(4500.0);
            
            $vistaVehiculo2 = new VistaVehiculo('Observador 2', $vehiculo);
            $vehiculo->setPrecio(5500.0);
            
            $vehiculo->retira($vistaVehiculo);
            $vehiculo->setPrecio(6500.0);
         
          
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
