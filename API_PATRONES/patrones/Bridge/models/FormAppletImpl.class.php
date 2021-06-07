<?php
namespace Bridge;

require_once 'FormularioImpl.class.php';

class FormAppletImpl implements FormularioImpl
{

    public function dibujaTexto($texto)
    {
    
        return array(
            'TIPO' =>  "Applet",
            'contenido' =>  $texto,
        );
    }

    public function gestionaZonaEntradaDatos($texto)
    {
        return $texto;
    }
}

?>
