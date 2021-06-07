<?php
namespace Mediator;

require_once 'Control.class.php';

class Formulario
{
    /**
     * @var "Lista de Control"
     */
    public $controls = array();
    /**
     * @var "Lista de Control"
     */
    public $controlsCodeudor = array();
    /**
     * @var PopupMenu
     */
    public $menuCodeudor;
    /**
     * @var Boton
     */
    public $botonOK;
    /**
     * @var boolean
     */
    public $Actual = true;

    /**
     *
     * @param Control $control            
     */
    public function agregaControl(Control $control)
    {
        $this->controls[] = $control;
        $control->setDirector($this);
        //return $this->controls;
    }

    /**
     *
     * @param Control $control            
     */
    public function agregaControlCodeudor(Control $control)
    {
        $this->controlsCodeudor[] = $control;
        $control->setDirector($this);
        //return $this->controlsCodeudor;
    }

    /**
     *
     * @param PopupMenu $menuCodeudor            
     */
    public function setMenuCodeudor(PopupMenu $menuCodeudor)
    {
        $this->menuCodeudor = $menuCodeudor;
    }

    /**
     *
     * @param Boton $botonOK            
     */
    public function setBotonOK(Boton $botonOK)
    {
        $this->botonOK = $botonOK;
    }

    /**
     *
     * @param Control $control            
     */
    public function controlModifica(Control $control)
    {
        if ($control == $this->menuCodeudor)
        {
            if ($control->getValor() === 'con codeudor')
            {
                foreach ($this->controlsCodeudor as $elementCodeudor)
                    $elementCodeudor->entradaDatos();
            }
        }
        if ($control === $this->botonOK)
        {
            $this->Actual = false;
        }
    }

    public function entradaDatos()
    {
        $resp= Array();

        while (true)
        {
            foreach ($this->controls as $control)
            {
                $resp[]= $control->entradaDatos();
               // var_dump($resp);
                if (! $this->Actual)
                    return $resp;
            }
        }
    
    }

}

?>
