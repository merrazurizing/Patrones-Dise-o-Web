<?php
namespace Mediator;

require_once 'Control.class.php';


class PopupMenu extends Control
{
    /**
     * @var "Lista de string"
     */
    public $opcions = array();

    /**
     *
     * @param string $nombre            
     */
    public function __construct($nombre)
    {
        parent::__construct($nombre);
    }

    public function entradaDatos()
    {
  
       $opcion = 0;
        if (($opcion >= 0) && ($opcion < count($this->opciones)))
        {
            $change = ! ($this->getValor() ===
                     $this->opciones[$opcion]);
            if ($change)
            {
                $this->setValor($this->opciones[$opcion]);
                $this->modifica();
            }
        }
        return array('Rellene el:' => $this->nombre,
        'Valor actual: ' =>  $this->getValor(),
        'Valores posibles:' => $this->opciones);
    }

    /**
     *
     * @param string $opcion            
     */
    public function agregaOption($opcion)
    {
        $this->opciones[] = $opcion;
    }
}

?>
