<?php
namespace Mediator;

require_once 'Formulario.class.php';

abstract class Control
{
    /**
     * @var string
     */
    public $valor = "";
    /**
     *
     * @var Formulario
     */
    public $director;
    /**
     * @var string
     */
    public $nombre;

    /**
     *
     * @param string $nombre            
     */
    public function __construct($nombre)
    {
        $this->setNombre($nombre);
    }

    /**
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     *
     * @param string $nombre            
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     *
     * @return Formulario
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     *
     * @param Formulario $director            
     */
    public function setDirector(Formulario $director)
    {  
        $this->director = $director;
    }

    /**
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     *
     * @param string $valor            
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public abstract function entradaDatos();

    public function modifica()
    {
        $this->getDirector()->controlModifica($this);
    }
}

?>
