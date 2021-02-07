<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionArticulos extends Model
{
    protected $table = 'asignacion_articulos';
    public $timestamps = false;
    
    public function pedidos() {
        return $this->hasMany(Pedido::class, 'id', 'id');
        //return $this->hasMany(Persona::class); --> Esto equivale a:     return $this->hasMany(Persona::class,'user_id','id');
    }
    
    public function articulos(){
        return $this->hasMany(Articulo::class, 'numeroSerie', 'numeroSerie');
    }
    
    public function pedidosBelong(){
        return $this->belongsTo(Pedido::class, 'id' , 'id');
    }
    
    public function articulosBelong(){
        return $this->belongsTo(Articulo::class, 'numeroSerie', 'numeroSerie');
    }
    
}
