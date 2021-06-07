<?php
namespace models;
abstract class Comida{
    /*
     * @var string
     */
    var $nombre;
    /*
     * @var string[]
     */
    var $receta = array();
    /*
     * @var int
     */
    var $cantidad; //En platos 
    /*
     * @var int
     */
    var $precio;

    public function __construct($nombre, $receta, $cantidad,$precio) {
        $this->nombre = $nombre;
        $this->receta = $receta;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    public abstract static function getReceta();
    
    //Función que verifica la existencia de ingredientes necesarios para la receta
    public static function getFactibilidad($receta){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
        //Viable = 1 significa que es factible
        $viable = 1;  
        foreach($receta as $key=>$value){

            $sql = "SELECT CantidadIngrediente FROM ingrediente WHERE NombreIngrediente = '$key'";
            $resultado = mysqli_query($conexion,$sql); 
           
            $aux = $receta[$key];           
            
            if (mysqli_fetch_assoc($resultado)['CantidadIngrediente'] < $aux){
                $viable = 0;                //Se cambia viable a 0 si la cantidad de los ingredientes buscados es menor a la receta
            };  
        }
        return $viable;        
    }    

    //Funcion definida para mostrar la Comida que es factible preparar con los ingredientes en base de datos
    public static function getMenu(){
        //Se define la verificacion para la CocinaNormal
        $comidaNormal = new CocinaNormal();
        $listaAlimentos=$comidaNormal->listarAlimentos();

        echo "Menu Normal";
        echo "<br>"; 

        //Se verifica la factiblidad de cada elemento de la cocinaNormal
        foreach($listaAlimentos as $key=>$value){
            if(Comida::getFactibilidad($listaAlimentos[$key]) == 1){
                echo $key;
                echo "<br>";       
            }
        }

        //Se define la verificacion para la CocinaVegano
        $comidaVegano = new CocinaVegano();
        $listaAlimentos=$comidaVegano->listarAlimentos();

        echo "Menu Vegano";
        echo "<br>"; 

        //Se verifica la factiblidad de cada elemento de la CocinaVegano
        foreach($listaAlimentos as $key=>$value){
            if(Comida::getFactibilidad($listaAlimentos[$key]) == 1){
                echo $key;
                echo "<br>";       
            }
        }

    }

    public abstract function descontarIngredienteInventario();
    /*
    public function editarReceta($ingrediente,$cantidad){         
        
        $aux = -1 * $cantidad;
        
        if(($this->receta[$ingrediente]*$this->cantidad)< $aux){
            $cantidad = $this->receta[$ingrediente];
        }
        
        $this->receta[$ingrediente] = $this->cantidad;
        $conexion = mysqli_connect("localhost","root","","proyecto_final");
        
        $sql =  $sql ="UPDATE ingrediente SET CantidadIngrediente = CantidadIngrediente + '$aux' WHERE NombreIngrediente = '$ingrediente'";
        $resultado = mysqli_query($conexion,$sql);     
        
        
    }

    //Se procede a definir el CRUD de la tabla comida/preparacion
    //Funcionalidad que ingresa en base de datos la comida/preparacion
    public function ingresarComida($nombre, $receta){
        
        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql = "INSERT INTO preparacion (Nombre, Receta, Cantidad, Precio) VALUES ('$nombre', '$receta', '$this->cantidad', '$this->precio')";
        $resultado = mysqli_query($conexion,$sql);
    }

    //Funcionalidad que actualiza en base de datos la comida/preparacion
    //la receta debe ser nueva
    public function modificarComida($nombre, $receta, $cantidad, $precio){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql =  $sql ="UPDATE preparacion SET Cantidad = '$cantidad', Receta = '$receta', Cantidad = '$cantidad', Precio = '$precio' WHERE Nombre = '$nombre'";
        $resultado = mysqli_query($conexion,$sql);  
    }

    //Funcionalidad que elimina en base de datos la comida/preparacion
    public function eliminaComida($nombre){
        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql = "DELETE FROM preparacion WHERE Nombre = '$nombre'";
        $resultado = mysqli_query($conexion,$sql);
    }

    //Funcionalidad creada para listar los elementos de la tabla comida/preparacion
    public function verComida($nombre){
        $comida = array();

        $conexion = mysqli_connect("localhost","root","","proyecto_final");       
        $sql = "SELECT * FROM preparacion";
        $resultado = mysqli_query($conexion,$sql);

        while(($row =  mysqli_fetch_assoc($resultado))) {
            $comida[] = $row['preparacion'];
        }

        echo $comida;
    }*/
    
    public function getPrecioUnitario(){
        return $this->precio;
    }
    public function getPrecio(){
        return $this->precio*$this->cantidad;
    }
    
}
?>