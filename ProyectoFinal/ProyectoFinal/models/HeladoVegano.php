<?php
namespace models;

require_once 'Postre.php';


class HeladoVegano extends Postre{
    
    /**
     *
     * @param int $cantidad                   
     *            
     */ 
    public function __construct($cantidad)
    {
        parent::__construct("Helado", array("MORA"=>1, "BANANA"=>1), $cantidad,2000);//1 es la cantidad de plátanos y 200 es la cantidad de leche en ml
        $this->descontarIngredienteInventario();
    }

    public static function getReceta(){
        return array("MORA"=>1, "BANANA"=>1);
    }

    //se descuentan los ingredientes requeridos para el heladoNormal en base de datos
    public function descontarIngredienteInventario(){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
        foreach($this->receta as $key=>$value){
            $aux = $this->receta[$key]*$this->cantidad;
            $sql ="UPDATE ingrediente SET CantidadIngrediente = CantidadIngrediente - '$aux' WHERE NombreIngrediente = '$key'";
            $resultado = mysqli_query($conexion,$sql);               
        }
    }
}
