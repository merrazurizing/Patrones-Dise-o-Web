<?php
namespace Observer;

require_once 'Observador.class.php';

abstract class Asunto
{
    /**
     * 
     * @var "Lista de Observador"
     */
    protected $observadores = array();
    
    /**
     *
     * @param Observador $observador            
     */
    public function agrega(Observador $observador)
    {
        $this->observadores[] = $observador;
    }

    /**
     *
     * @param Observador $observador            
     */
    public function retira(Observador $observador)
    {
        $key = array_search($observador, $this->observadores);
        if ($key !== FALSE)
        {
            unset($this->observadores[$key]);
        }
    }

    public function notifica()
    {
        foreach ($this->observadores as $observador)
        {
            $observador->actualiza();
        }
    }
}

?>
