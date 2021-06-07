<?php
namespace Iterator;


class Catalogo
{
     /**
     * 
     * @var "lista de Element"
     */
    protected $contenido;

    public function __construct()
    {
        $this->contenido = array();
    }
    
    /**
     *
     * @param Element $e            
     */
    function agrega(Element $e) {
        $this->contenido[] = $e;
    }

    /**
     * 
     * @param string $palabraClaveConsulta
     * @return Iterador
     */
    public function busqueda($palabraClaveConsulta)
    {
        $resultado = new Iterador();
        $resultado->setPalabraClaveConsulta($palabraClaveConsulta, $this->contenido);
        return $resultado;
    }
}
?>
