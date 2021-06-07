<?php
namespace Proxy;



class Pelicula implements Animation
{
    public function clic(){}

    public function dibuja()
    {
        return 'Muestra la pelicula';
    }

    public function carga()
    {
        return 'Carga de la pelicula';
    }

    public function reproduce()
    {
        return 'Reproduce la pelicula';
    }
}


?>
