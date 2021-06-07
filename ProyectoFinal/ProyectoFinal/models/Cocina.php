<?php
namespace models;

interface Cocina
{
    /**
     *
     * @param int $cantidad                   
     *            
     */ 
    
    public function crearPlatoFondo($cantidad);
    
    /**
     *
     * @param int $cantidad                   
     *            
     */ 
    
    public function crearPostre($cantidad);

    public function listarALimentos();

}

?>
