<?php
namespace models;

require_once 'Cocina.php';
require_once 'HeladoNormal.php';
require_once 'Asado.php';

class CocinaNormal implements Cocina{
    /**
     *
     * @param int $cantidad                   
     *            
     */
    public function crearPlatoFondo($cantidad){
        return new Asado($cantidad);    
    }

    /**
     *
     * @param int $cantidad                   
     *            
     */
    public function crearPostre($cantidad){
        return new HeladoNormal($cantidad);
    }

    //Se retorna el array compuesto de la receta de las Comida pertenecientes a CocinaNormal
    public function listarAlimentos(){
        return array("Asado"=>Asado::getReceta(), "Helado Normal" => HeladoNormal::getReceta());
    }
}

?>
