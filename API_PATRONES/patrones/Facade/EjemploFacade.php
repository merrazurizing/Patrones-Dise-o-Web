<?php

namespace Facade;

use Exception;


require_once 'models/WebServiceAutoImpl.class.php';

class EjemploFacade
{



    public function __construct()
    {


     
    }

    public function generar()
    {
        try {

          
            $webServiceAuto = new WebServiceAutoImpl();
            $documento1=$webServiceAuto->documento(0);
            $documento2=$webServiceAuto->documento(1);
            
            $resultados = $webServiceAuto->BuscaVehiculos(6000, 1000); 
            if (count($resultados) > 0)
            {
                $mensajerespuesta='Vehículo(s) con precio incluido  ' .
                        'entre 5000 y 7000';
             
            }

            $r=array('Documento1=' => $documento1,
            'Documento2' => $documento2,
            'Respuesta' =>$mensajerespuesta,
            'Listado'=>(count($resultados)>0)?$resultados:"Sin resultados"
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
