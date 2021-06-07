<?php
namespace Memento;


class OpcionVehiculo
{
    /**
     * 
     * @var string
     */
    protected $nombre;
    /**
     * @var ListaOpcionVehiculo
     */
    protected $opcionsIncompatibles;

    /**
     * 
     * @param string $nombre
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->opcionesIncompatibles = new ListaOpcionVehiculo();
    }

    /**
     * 
     * @param OpcionVehiculo $opcionIncompatible
     */
    public function agregaOptionIncompatible(OpcionVehiculo
            $opcionIncompatible)
    {
        if (!$this->opcionesIncompatibles
              ->contains($opcionIncompatible))
        {
            $this->opcionesIncompatibles
             ->add($opcionIncompatible);
            $opcionIncompatible->agregaOptionIncompatible($this);
        }
    }

    /**
     * @return ListaOpcionVehiculo
     */
    public function getOpcionsIncompatibles()
    {
        return $this->opcionesIncompatibles;
    }

    /**
     * @return void
     */
    public function muestra()
    {

        return "opción:". $this->nombre;
    }
}


?>
