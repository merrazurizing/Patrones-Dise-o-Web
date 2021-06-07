<?php
namespace Facade;

interface Catalogo
{

    /**
     *
     * @param int $precioMin            
     * @param int $precioMax            
     * @return "Lista de string"
     */
    function encuentraVehiculos($precioMin, $precioMax);
}

?>
