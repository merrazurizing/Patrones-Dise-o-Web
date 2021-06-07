<?php
namespace Visitor;

require_once 'Visitante.class.php';

abstract class Empresa
{
    /**
     * 
     * @var string
     */
    public $nombre;
    /**
     * 
     * @var string
     */
    public $email;
    /**
     * 
     * @var string
     */
    public $direccion;

    /**
     * 
     * @param string $nombre
     * @param string $email
     * @param string $direccion
     */
    public function __construct($nombre, $email, $direccion)
    {
        $this->setNombre($nombre);
        $this->setEmail($email);
        $this->setDireccion($direccion);
    }

    /**
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
    protected function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * 
     * @param string $email
     */
    protected function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * 
     * @param string $direccion
     */
    protected function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @param Empresa $filial
     * @return boolean
     */
    public abstract function agregaFilial(Empresa $filial);

    /**
     * 
     * @param Visitante $visitante
     */
    public abstract function aceptaVisitante(Visitante $visitante);

}

?>
