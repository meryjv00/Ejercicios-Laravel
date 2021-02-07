<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model {

    //protected $table = 'articulos'; //Por defecto tomaría la tabla 'articulos'.
    protected $primaryKey = 'numeroSerie';  //Por defecto el campo clave es 'id', entero y autonumérico.
    public $incrementing = false; //Para indicarle que la clave no es autoincremental.
    protected $keyType = 'string';   //Indicamos que la clave no es entera.
    public $timestamps = false;   //Con esto Eloquent no maneja automáticamente created_at ni updated_at.

    public function articulosPedidos() {
        return $this->hasMany('App\Models\AsignacionArticulos', 'numeroSerie', 'numeroSerie');
    }
    
}
