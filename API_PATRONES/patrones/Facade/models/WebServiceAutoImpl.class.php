<?php
namespace Facade;

require_once 'WebServiceAuto.class.php';
require_once 'ComponenteCatalogo.class.php';
require_once 'ComponenteGestionDocumento.class.php';

class WebServiceAutoImpl implements WebServiceAuto
{
    /**
     * 
     * @var Catalogo
     */
    protected $catalogo;
    /**
     * 
     * @var GestionDocumento
     */
    protected $gestionDocumento;
    
    public function __construct()
    {
        $this->catalogo = new ComponenteCatalogo();
        $this->gestionDocumento = new ComponenteGestionDocumento();
    }

    public function documento($indice)
    {
        return $this->gestionDocumento->documento($indice);
    }

    public function BuscaVehiculos($precioMedio, $DistanciaMaxima)
    {
        return $this->catalogo->encuentraVehiculos(
                $precioMedio - $DistanciaMaxima, $precioMedio + $DistanciaMaxima);
    }
}

?>
