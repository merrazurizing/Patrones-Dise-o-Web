<?php
namespace Bridge;

interface FormularioImpl
{

    /**
     *
     * @param string $texto            
     */
    function dibujaTexto($texto);

    /**
     * @return string
     */
    function gestionaZonaEntradaDatos($texto);
}

?>
