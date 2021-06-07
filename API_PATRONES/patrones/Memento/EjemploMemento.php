<?php

namespace Memento;

use Exception;

require_once 'models/OpcionVehiculo.class.php';
require_once 'models/CarritoOption.class.php';


class EjemploMemento
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          
            $r=array();
            $opcion1 = new OpcionVehiculo('Asientos de cuero');
            $opcion2 = new OpcionVehiculo('Reclinables');
            $opcion3 = new OpcionVehiculo('Asientos deportivos');
            $opcion1->agregaOptionIncompatible($opcion3);
            $opcion2->agregaOptionIncompatible($opcion3);
            
            $carritoOptions = new CarritoOption();
            $carritoOptions->agregaOption($opcion1);
            $carritoOptions->agregaOption($opcion2);
            $r[]=$carritoOptions->muestra();
            
            $memento = $carritoOptions->agregaOption($opcion3);
            $r[]=$carritoOptions->muestra();
            $carritoOptions->anula($memento);
            $r[]=$carritoOptions->muestra();

         
            
        
           
          
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
