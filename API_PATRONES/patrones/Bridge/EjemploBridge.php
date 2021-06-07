<?php

namespace Bridge;

use Exception;

require_once 'models/FormMatriculacionLuxemburgo.class.php';
require_once 'models/FormhtmlImpl.class.php';
require_once 'models/FormMatriculacionEspana.class.php';
require_once 'models/FormAppletImpl.class.php'; 

class EjemploBridge
{
    public $opcion;
    public $texto;


    public function __construct($opcion,$texto)
    {

        $this->opcion = $opcion;
        $this->texto = $texto;
     
    }

    public function generar()
    {
        try {

            switch ($this->opcion) {
                case 1:
                    
                    $formulario = new FormMatriculacionLuxemburgo(new FormhtmlImpl());
                    break;
                case 2:
                    $formulario = new FormMatriculacionEspana(new FormAppletImpl());
                    break;
                default:

                    throw new \Exception("Opción ".$this->opcion." desconocida --Opciones disponibles:: opc 1: FormMatriculacionLuxemburgo -opc 2: FormMatriculacionEspana ");

            }

            $r= $formulario->muestra();
          
            if ($formulario->gestionaEntrada($this->texto))
            {
                $r= $formulario->generaDocumento();
            }

        
           
          
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
