<?php
namespace Composite;

abstract class Empresa
{
    /**
     * 
     * @var double
     */
    protected static $costeUnitarioVehiculo = 5.0;
    /**
     * 
     * @var int
     */
    protected $numVehiculos;
    
    public function agregaVehiculo()
    {
        $this->numVehiculos++;
    }

    /**
     *
     * @return double
     */
    public abstract function calculaGastoMantenimiento();

    /**
     *
     * @param Empresa $filial            
     * @return boolean
     */
    public abstract function agregaFilial(Empresa $filial);
}

?>
