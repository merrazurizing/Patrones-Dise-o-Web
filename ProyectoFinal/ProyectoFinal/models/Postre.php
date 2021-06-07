<?php
namespace models;
require_once 'Comida.php';
abstract class Postre extends Comida
{
    /**
     *
     * @param string $nombre            
     * @param array(string) $receta    
     * @param int $cantidad       
     * @param int $precio
     *            
     */ 
    public function __construct($nombre, $receta, $cantidad,$precio)
    {
        parent::__construct($nombre, $receta, $cantidad,$precio);
    }
    //Resta los ingredientes usados en la preparación de la comida en la base de datos
    public function descontarIngredienteInventario(){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
        foreach($this->receta as $key=>$value){
            $aux = $this->receta[$key];
            $sql ="UPDATE ingrediente SET CantidadIngrediente = CantidadIngrediente - '$aux' WHERE NombreIngrediente = '$key'";
            $resultado = mysqli_query($conexion,$sql);               

        }
    }
}

?>
