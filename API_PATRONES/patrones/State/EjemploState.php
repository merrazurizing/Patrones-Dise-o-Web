<?php

namespace State;

use Exception;


require_once 'models/Pedido.class.php';
require_once 'models/Producto.class.php';

class EjemploState
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

            $r=Array();

            $pedido = new Pedido();
            $pedido->agregaProducto(new Producto('vehículo 1'));
            $pedido->agregaProducto(new Producto('Accesorio 2'));
            //$pedido->muestra();
            $r[]=Array("pedido1"=>$pedido->muestra());
            $pedido->estadoSiguiente();
            $pedido->agregaProducto(new Producto('Accesorio 3'));
            $pedido->elimina();
            $pedido->muestra();
            $r[]=Array("pedido1"=>$pedido->muestra());
            
            $pedido2 = new Pedido();
            $pedido2->agregaProducto(new Producto('vehículo 11'));
            $pedido2->agregaProducto(new Producto('Accesorio 21'));
            $r[]=Array("pedido2"=>$pedido2->muestra());
            $pedido2->estadoSiguiente();
            $r[]=Array("pedido2"=>$pedido2->muestra());
            $pedido2->estadoSiguiente();
            $pedido2->elimina();
            $r[]=Array("pedido2"=>$pedido2->muestra());
         
            
        
           
          
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
