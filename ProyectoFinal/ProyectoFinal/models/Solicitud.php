<?php
namespace models;

require_once 'EstadoSolicitud.php';

class Solicitud
{
    

    /*
     * @var Cliente
     */
    var $cliente;
    /*
     * @var string
     */
    var $tipoSolicitud;
    /**
     *
     * @param Cliente $cliente            
     * @param string $tipoSolicitud    
     * @param array(string) $alimentos       
     *            
     */ 
    public function __construct(Cliente $cliente,$tipoSolicitud,$alimentos)
    {
        $this->cliente=$cliente;
        $this->tipoSolicitud= new IniciarSolicitud($alimentos,$tipoSolicitud);
        $this -> ingresarSolicitud();
    }
    /**
     *
     * @param string $id    
     *            
     */ 
    public function eliminarSolicitud($id){
       $sql = "DELETE FROM solicitud WHERE ID = '$id'";
       $resultado = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql);    
    }
    //Añade la solicitud actual a la bd
    public function ingresarSolicitud(){    
        $nombre = $this->cliente->nombre;
        $telefono = $this->cliente->telefono;
        $tipoPedido = $this->tipoSolicitud->tipoPedido;
        $estadoPedido = $this->tipoSolicitud->getEstado();
        
        $sql = "INSERT INTO solicitud (TipoPedido,Nombre,Telefono,Estado) VALUES ('$tipoPedido','$nombre','$telefono','$estadoPedido')";
        $resultado = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql);        
    }
    /**
     *
     * @param string $alimento       
     *            
     */ 
    //Modifica el alimento ingresado en la bd
    public function modificarSolicitud($alimento){
        $this->tipoSolicitud->editarSolicitud($alimento);
    }
    //pasa al estado siguiente
    public function estadoSiguiente(){
        $this->tipoSolicitud=$this->tipoSolicitud->estadoSiguente();
    }
    //muestra la solicitud actual
    public function mostrarSolicitud(){
        return json_encode(array(
            'cliente: ' => $this->cliente->mostrarCliente(),
            'Estado Solicitud: ' => $this->tipoSolicitud->getEstado(),
            'Tipo Solicitud: ' => $this->tipoSolicitud->getTipoPedido(),
            'alimentos' => $this->tipoSolicitud->getListaComida(),
        ),JSON_PRETTY_PRINT);
    }
    //muestra todas las solicitudes en la base de datos
    public static function getHistorialSolicitud(){

       $sql = "SELECT * FROM solicitud";

       $resultado = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql); 
       
       while(($row =  mysqli_fetch_assoc($resultado))) {
            $historial[] = $row['Nombre']."- ".$row['TipoPedido']." - ".$row['Estado'];
        }       

        return $historial;

    }

}

?>
