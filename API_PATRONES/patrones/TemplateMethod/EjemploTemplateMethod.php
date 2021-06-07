<?php

namespace TemplateMethod;

use Exception;

require_once 'models/PedidoEspana.class.php';
require_once 'models/PedidoLuxemburgo.class.php';


class EjemploTemplateMethod
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          
            
            $r=Array();
            $pedidoEspana = new PedidoEspana();
            $pedidoEspana->setCantidadSinIVA(10000);
            $pedidoEspana->calculaCantidadConIVA();
            //$pedidoEspana->muestra();
            
            $r[]= Array("PedidoEspana"=> $pedidoEspana->muestra());

            $pedidoLuxemburgo = new PedidoLuxemburgo();
            $pedidoLuxemburgo->setCantidadSinIVA(10000);
            $pedidoLuxemburgo->calculaCantidadConIVA();
            //$pedidoLuxemburgo->muestra();

            $r[]= Array("PedidoLuxemburgo"=>$pedidoLuxemburgo->muestra());

         
            
        
           
          
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
