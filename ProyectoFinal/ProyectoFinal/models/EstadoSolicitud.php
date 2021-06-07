<?php
namespace models;

abstract class EstadoSolicitud 
{
    /*
     * @var string[]
     */
	var $listaComida= array();
    /*
     * @var TipoSolicitud
     */
	var $tipoPedido;

	public function __construct($listaComida,$tipoPedido) {
        $this->listaComida = $listaComida;
        $this->tipoPedido = $tipoPedido;
    }
    
    public abstract function estadoSiguente();

    public function editarSolicitud($comida){
        $this->listaComida[]=$comida;
    }

    public abstract function getEstado();

    public abstract function cancelar();
    
    //CRUD que actualiza el valor del campo estado de la solicitud en la base datos.
    public function updateEstado(){        
        $estado = $this->getEstado();   //Se reucpera el valor estado usando la funcion correspondiente
        $sql = "UPDATE solicitud SET Estado = '$estado' WHERE ID = (SELECT ID FROM solicitud WHERE ID = (SELECT MAX(ID) FROM solicitud )) ";
        $resultado = mysqli_query(mysqli_connect("localhost","root","","proyecto_final"),$sql); 
    }

    /**
     *
     * @param string[] $listaComida                   
     *            
     */ 
    public function getListaComida(){
        return $this->listaComida;
    }
    /**
     *
     * @param TipoSolicitud $tipoPedido                   
     *            
     */ 
    public function getTipoPedido(){
        return $this->tipoPedido;
    }

}

?>
