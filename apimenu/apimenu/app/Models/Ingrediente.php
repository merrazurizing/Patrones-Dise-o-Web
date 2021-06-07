<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $table="ingrediente";
    protected $fillable = array('nombre','tipo','cantidad','praparacion_id');
    protected $hidden = ['created_at','updated_at'];

        // Relación de Avión con Fabricante:
        public function preparacion()
        {
            // 1 avión pertenece a un Fabricante.
            // $this hace referencia al objeto que tengamos en ese momento de Avión.
            return $this->belongsTo('App\Preparacion');
        }
}
