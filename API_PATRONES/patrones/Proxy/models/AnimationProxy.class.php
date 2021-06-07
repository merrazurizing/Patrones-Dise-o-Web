<?php
namespace Proxy;

require_once 'Animation.class.php';
require_once 'Pelicula.class.php';


class AnimationProxy implements Animation
{
    /**
     * 
     * @var Pelicula
     */
    protected $pelicula = null;
    /**
     * 
     * @var string
     */
    protected $foto = 'muestra la foto';

    public function clic()
    {
        if (!isset($this->pelicula))
        {
            $this->pelicula = new Pelicula();
            return $this->pelicula->carga();
        }
       return  $this->pelicula->reproduce();
    }

    public function dibuja()
    {
        if (isset($this->pelicula)) 
        {
            return $this->pelicula->dibuja();
        }
        else
        {
           return $this->dibujaPhoto($this->foto);
        }
    }

    /**
     *
     * @param string $foto
     */
    public function dibujaPhoto($foto)
    {
        return $this->foto;
    }
}


?>
