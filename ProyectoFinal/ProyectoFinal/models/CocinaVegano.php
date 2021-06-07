<?php
namespace models;

require_once 'Cocina.php';
require_once 'HeladoVegano.php';
require_once 'Lenteja.php';

class CocinaVegano implements Cocina{

    /**
     *
     * @param int $cantidad                   
     *            
     */
 	public function crearPlatoFondo($cantidad){
        return new Lenteja($cantidad);
    }

     /**
     *
     * @param int $cantidad                   
     *            
     */
    public function crearPostre($cantidad){
        return new HeladoVegano($cantidad);
    }

    //Se retorna el array compuesto de la receta de las Comida pertenecientes a CocinaVegano
    public function listarAlimentos(){        
        return array("Lenteja"=>Lenteja::getReceta(), "Helado Vegano" => HeladoVegano::getReceta());
    }

    
}

?>
