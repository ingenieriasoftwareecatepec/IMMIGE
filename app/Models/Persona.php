<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table= 'personas';

    protected $fillable = [
        'name',
        'ap_paterno',
        'ap_materno',
        'curp',
        'colonia_id',
        'user_id',
        'telefono',
        'fecha_nac',
    ];


    public function colonia(){
        return $this->belongsTo(Colonia::class, 'colonia_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function negocio(){
        return $this->hasMany(Negocio::class, 'persona_id');
    }

}
