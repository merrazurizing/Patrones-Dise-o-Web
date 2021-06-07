<?php
namespace models;

use mysqli;

class Inventario
{
    //Lista los ingredientes en la base de datos y sus caracteristicas
    public static function listarIngrediente(){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
       
        $sql = "SELECT NombreIngrediente, CantidadIngrediente FROM ingrediente";
        $resultado = mysqli_query($conexion,$sql); 
        $array = array();
        
        while ($row=mysqli_fetch_assoc($resultado)){
            $nombreIngrediente=$row['NombreIngrediente'];
            $cantidadIngrediente=$row['CantidadIngrediente'];
            $array[]=  $nombreIngrediente. " " .$cantidadIngrediente;
        }
        return $array;
    }
    /**
     *
     * @param string $ingrediente
     *            
     */
    //Elimina el ingrediente especificado de la base de datos
    public static function eliminarIngrediente($ingrediente){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql = "DELETE FROM ingrediente WHERE NombreIngrediente = '$ingrediente'";
        $resultado = mysqli_query($conexion,$sql);
    }
    /**
     *
     * @param string $ingrediente
     * @param int $cantidad
     *            
     */
    //Elimina el ingresa el ingrediente especificado a la base de datos
    public static function ingresarIngrediente($ingrediente, $cantidad){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql = "INSERT INTO ingrediente (NombreIngrediente,CantidadIngrediente) VALUES ('$ingrediente','$cantidad')";
        $resultado = mysqli_query($conexion,$sql);
    }
    //Funcionalidad que ingresa $cantidad ingredientes al ingrediente señalado a la base de datos    
    public static function modificarIngrediente($ingrediente, $cantidad){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql =  $sql ="UPDATE ingrediente SET CantidadIngrediente = CantidadIngrediente + '$cantidad' WHERE NombreIngrediente = '$ingrediente'";
        $resultado = mysqli_query($conexion,$sql);  
    }

    public function nada(){}
}

?>