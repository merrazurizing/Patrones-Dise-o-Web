<?php
namespace Adapter;

interface Documento
{

    /**
     *
     * @param string $contenido            
     */
    function setContenido($contenido);

    function dibuja();

    function imprime();
}
