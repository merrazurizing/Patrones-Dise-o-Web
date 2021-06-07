<?php

namespace Flyweight;

use Exception;


require_once 'models/FabricaOption.class.php';
require_once 'models/VehiculoPedido.class.php';

class EjemploFlyweight
{
 

    public function __construct()
    {

     
     
    }

    public function generar()
    {
        try {

            $fabrica = new FabricaOption();
            $vehiculo = new VehiculoPedido();
            $vehiculo->agregaOpciones('air bag', 80, $fabrica);
            $vehiculo->agregaOpciones('direcci�n asistida', 90, $fabrica);
            $vehiculo->agregaOpciones('elevalunas el�ctricos', 85, $fabrica);
            $r=$vehiculo->muestraOptions();

           
          
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
