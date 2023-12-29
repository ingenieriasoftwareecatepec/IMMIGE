<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table= 'eventos';
    protected $fillable= ['nombre','ubicacion','mapa','cupo','fecha_ini','fecha_fin','estatus_evento_id'];

    public function estatus(){
        return $this->belongsTo(EstatusEvento::class, 'estatus_evento_id');
    }

    public function negocios(){
        return $this->belongsToMany(Negocio::class, 'negocios_eventos', 'evento_id', 'negocio_id')
                ->withPivot(['lugar']);
    }
    

}
