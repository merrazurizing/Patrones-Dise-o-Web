<?php

namespace Adapter;

use Exception;


require_once 'models/DocumentoHtml.class.php';
require_once 'models/DocumentoPdf.class.php';

class EjemploAdapter
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
                    $documento = new Documentohtml();
                    break;
                case 2:
                    $documento = new DocumentoPdf();
                    break;
                default:

                    throw new \Exception("Opción ".$this->opcion." desconocida --Opciones disponibles:: opc 1: Documentohtml -opc 2: DocumentoPdf ");

            }

            $documento->setContenido($this->texto);
            $r=$documento->dibuja();

           
          
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
