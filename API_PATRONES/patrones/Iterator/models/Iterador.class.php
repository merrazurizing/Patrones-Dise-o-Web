<?php
namespace Iterator;

class Iterador
{
    /**
     *
     * @var string
     */
    protected $palabraClaveConsulta;
    /**
     *
     * @var int
     */
    protected $indice;
    /**
     *
     * @var "Lista de Element"
     */
    protected $contenido;

    /**
     *
     * @param string $palabraClaveConsulta            
     * @param "Lista de Element" $contenido            
     * @return void
     */
    public function setPalabraClaveConsulta($palabraClaveConsulta, $contenido)
    {
        $this->palabraClaveConsulta = $palabraClaveConsulta;
        $this->contenido = $contenido;
    }

    /**
     *
     * @return void
     */
    public function inicio()
    {
        $this->indice = -1;
        $this->siguiente();
    }

    /**
     *
     * @return void
     */
    public function siguiente()
    {
        $tama�o = count($this->contenido);
        $this->indice ++;
        while (($this->indice < $tama�o) &&
                 (! $this->contenido[$this->indice]->palabraClaveValida(
                        $this->palabraClaveConsulta)))
        {
            $this->indice ++;
        }
    }

    /**
     *
     * @return Element null
     */
    public function item()
    {
        if ($this->indice < count($this->contenido))
        {
            return $this->contenido[$this->indice];
        }
        else
        {
            return null;
        }
    }
}

?>
