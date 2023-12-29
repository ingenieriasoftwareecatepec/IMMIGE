<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegocioEvento extends Model
{
    use HasFactory;

    protected $table= 'negocios_eventos';

    protected $fillable= ['negocio_id','evento_id','lugar'];

    public function negocio(){
        return $this->belongsTo(Negocio::class, 'negocio_id');
    }

    public function evento(){
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
