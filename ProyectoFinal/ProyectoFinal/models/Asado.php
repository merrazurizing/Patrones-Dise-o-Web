<?php
namespace models;

require_once 'Comida.php';


class Asado extends Comida
{
    /*
     * @var array
     */
    
    var $receta =  array("CARNE"=>1, "SAL"=>200);   //se define la receta de Comida de la forma Ingredente => Cantidad

    /**
     *
     * @param int $cantidad                   
     *            
     */ 
    public function __construct($cantidad)
    {
        parent::__construct("Asado", $this->receta, $cantidad,2000);//1 es la cantidad de lomitos y 200 es la cantidad de sal en g
        $this->descontarIngredienteInventario();
    }

    //Se entrega el array receta
    public static function getReceta(){
        return array("CARNE"=>1, "SAL"=>200);
    }

    //Buscando en la base de datos se descuentan los ingredientes correspondientes a esta Comida
    public function descontarIngredienteInventario(){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
        foreach($this->receta as $key=>$value){
            $aux = $this->receta[$key]*$this->cantidad; //Se guarda la cantidad necesitaria a eliminar dependiendo de la cantidad y la receta
            $sql ="UPDATE ingrediente SET CantidadIngrediente = CantidadIngrediente - '$aux' WHERE NombreIngrediente = '$key'";
            $resultado = mysqli_query($conexion,$sql);
        }
    }
}

?>
