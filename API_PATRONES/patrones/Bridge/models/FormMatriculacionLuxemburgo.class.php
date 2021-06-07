<?php
namespace Bridge;

require_once 'FormularioMatriculacion.class.php';
require_once 'FormularioImpl.class.php';

class FormMatriculacionLuxemburgo extends FormularioMatriculacion
{
    const NUM_CARACTERES = 5;

    /**
     *
     * @param FormularioImpl $implantacion            
     */
    public function __construct(FormularioImpl $implantacion)
    {
        parent::__construct($implantacion);
    }

    protected function controlEntrada($matricula)
    {
        return strlen($matricula) == 
            FormMatriculacionLuxemburgo::NUM_CARACTERES;
    }

   protected function getRestriccion()
    {
        return FormMatriculacionLuxemburgo::NUM_CARACTERES .
            ' car.';
    }
}

?>
