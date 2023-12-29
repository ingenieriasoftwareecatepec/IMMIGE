<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusEvento extends Model
{
    use HasFactory;

    protected $table= 'estatus_eventos';

    public function evento(){
        return $this->hasMany(Evento::class, 'estatus_evento_id');
    }
}
