<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $table='negocios';

    protected $fillable= ['persona_id','nombre','giro_id','giro_otro','descripcion','map','distribuidor'];


    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function giro(){
        return $this->belongsTo(Giro::class, 'giro_id');
    }

    public function eventos(){
        return $this->belongsToMany(Evento::class, 'negocios_eventos', 'negocio_id', 'evento_id')
                ->withPivot(['lugar']);
    }

    public function imagen(){
        return $this->hasOne(NegocioImg::class, 'negocio_id');
    }

    public function producto(){
        return $this->hasMany(Producto::class, 'negocio_id');
    }
    
}
