<?php
namespace Bridge;


require_once 'FormularioImpl.class.php';

class FormhtmlImpl implements FormularioImpl
{

    public function dibujaTexto($texto)
    {
        return array(
            'TIPO' =>  "HTML",
            'contenido' =>  $texto,
        );
     
    }

    public function gestionaZonaEntradaDatos($texto)
    {
        return $texto;
    }
}
?>
