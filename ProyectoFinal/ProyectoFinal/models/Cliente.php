<?php

namespace models;
class Cliente{
        
     /*
     * @var string
     */
    var $nombre;
    /*
     * @var string
     */
    var $telefono;

    public function __construct($nombre, $telefono)
    {
        $this->nombre=$nombre;
        $this->telefono=$telefono;
        $this->ingresarCliente();
        
    }
    
    //Eliminación de datos del cliente en la base de datos
    public function eliminarCliente(){
        $sql = "DELETE FROM Cliente WHERE Nombre = '$this->nombre' AND Telefono = '$this->telefono'";
        $nombre="";
        $telefono="";
    }
    
    //Ingreso de datos del cliente a la base de datos
    public function ingresarCliente(){
        $sql = "INSERT INTO cliente(Nombre,Telefono) VALUES ('$this->nombre','$this->telefono')";
        $result = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql);
    }
    
    /**
     *
     * @param string $nombreEditado                   
     *            
     */

    //Se actualiza el nombre del cliente en la base de datos
    public function modificarNombreCliente($nombreEditado){
        $sql="UPDATE cliente SET Nombre='$nombreEditado' WHERE Nombre= '$this->nombre' AND Telefono='$this->telefono'";
        $result = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql);
        $nombre=$nombreEditado;
    }
    
    /**
     *
     * @param string $telefonoEditado                   
     *            
     */ 
    //Se actualiza el telefono del cliente en la base de datos
    public function modificarTelefonoCliente($telefonoEditado){
        $sql="UPDATE cliente SET Nombre='$telefonoEditado' WHERE Nombre= '$this->nombre' AND Telefono='$this->telefono'";
        $result = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql);
        $telefono=$telefonoEditado;
    }
    
    
    public function mostrarCliente(){
        return array(
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
        );
    }

}




?>
