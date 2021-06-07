<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
    use HasFactory;
    // Nombre de la tabla en MySQL.
	protected $table="preparacion";

	// Atributos que se pueden asignar de manera masiva.
	protected $fillable = array('nombre','categoria','estado');
	
	// Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
	protected $hidden = ['created_at','updated_at']; 

    	// Relación de Fabricante con Aviones:
	public function ingredientes()
	{	
		// 1 fabricante tiene muchos aviones
		// $this hace referencia al objeto que tengamos en ese momento de Fabricante.
		return $this->hasMany('App\Ingrediente');
	}
}
