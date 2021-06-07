<?php
namespace Facade;

require_once 'GestionDocumento.class.php';

class ComponenteGestionDocumento implements GestionDocumento
{

    public function documento($indice)
    {
        return "Documento n�mero $indice";
    }
}

?>
