<?php

namespace Interpreter;

use Exception;

require_once 'models/Expression.class.php';

class EjemploInterpreter
{
    public $consulta;
    public $descripcion;


    public function __construct($consulta,$descripcion)
    {
        $this->consulta = $consulta;
        $this->descripcion = $descripcion;
     
    }

    public function generar()
    {
        try {

          

            $expresionConsulta = null;
            //Escriba una consulta: 
            $expresionConsulta = Expression::analisis($this->consulta);

         
            
            if (isset($expresionConsulta))
            {
         //Escriba el texto de la descripci�n de un veh�culo
                if ($expresionConsulta->evalua($this->descripcion))
                {
                    $r='La descripci�n responde a  la consulta';
                }
                else
                {
                    $r='La descripci�n no responde a  la consulta';
                }
            }
           
          
            $respuesta = array('Estado' => "success",
                'Response' => $r);
            return $respuesta;
        } catch (Exception $e) {
            $expresionConsulta = null;
            $respuesta = array('Estado' => "Error",
                'Response' => $e->getMessage());
            return $respuesta;
        }
    }

}
