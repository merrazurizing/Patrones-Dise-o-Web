<?php

namespace Proxy;

use Exception;


require_once 'models/AnimationProxy.class.php';


class EjemploProxy
{
    

    public function __construct()
    {

       
     
    }

    public function generar()
    {
        try {

           

            $animation = new AnimationProxy();
            $animation->dibuja();
            $animation->clic();
            $r=$animation->dibuja();

           
          
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
