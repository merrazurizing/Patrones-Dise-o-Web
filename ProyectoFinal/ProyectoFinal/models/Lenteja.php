<?php
namespace models;

require_once 'PlatoFondo.php';


class Lenteja extends PlatoFondo
{
    
    /**
     *
     * @param int $cantidad
     *            
     */
    public function __construct($cantidad)
    {
        parent::__construct("Lenteja", array("LENTEJA"=>200, "LONGANIZA VEGANA"=>1), $cantidad,2000);//200 es la cantidad de gramos y 0.5 es la cantidad de longanizas veganas
        $this->descontarIngredienteInventario();
    }
    //retorna la receta de las lentejas
    public static function getReceta(){
        return array("LENTEJA"=>200, "LONGANIZA VEGANA"=>1);
    }
    

    //Resta los ingredientes usados en la preparación de la comida en la base de datos
    public function descontarIngredienteInventario(){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
        foreach($this->receta as $key=>$value){
            $aux = $this->receta[$key]*$this->cantidad;
            $sql ="UPDATE ingrediente SET CantidadIngrediente = CantidadIngrediente - '$aux' WHERE NombreIngrediente = '$key'";
            $resultado = mysqli_query($conexion,$sql);               

        }
    }
}

?>
