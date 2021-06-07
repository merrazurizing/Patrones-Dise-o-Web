<?php
namespace Composite;

require_once 'Empresa.class.php';

class EmpresaMatriz extends Empresa
{
    /**
     * 
     * @var "Lista de Empresa"
     */
    protected $filiales = array();
    
    public function agregaFilial(Empresa $filial)
    {
        $this->filiales[] = $filial;
        return true; 
    }

    public function calculaGastoMantenimiento()
    {
        $cout = 0.0;
        foreach ($this->filiales as $filial)
        {
            $cout += $filial->calculaGastoMantenimiento();
        }
        return $cout + $this->numVehiculos *
                 EmpresaMatriz::$costeUnitarioVehiculo;
    }
}

?>
