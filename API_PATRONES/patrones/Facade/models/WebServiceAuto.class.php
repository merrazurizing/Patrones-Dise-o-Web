<?php
namespace Facade;

interface WebServiceAuto
{

    /**
     *
     * @param int $indice            
     * @return string
     */
    function documento($indice);

    /**
     *
     * @param int $precioMedio            
     * @param int $DistanciaMaxima            
     * @return "Lista de string"
     */
    function BuscaVehiculos($precioMedio, $DistanciaMaxima);
}

?>
