<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegocioImg extends Model
{
    use HasFactory;

    protected $table = 'negocio_img';

    protected $fillable= ['negocio_id','url','archivo'];

    public function negocio(){
        return $this->belongsTo(Negocio::class, 'negocio_id');
    }
}
