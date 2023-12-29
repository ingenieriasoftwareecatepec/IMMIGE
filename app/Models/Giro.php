<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    use HasFactory;

    protected $table= 'giros';

    protected $fillable= ['descripcion'];

    
    public function negocio(){
        return $this->hasMany(Negocio::class, 'giro_id');
    }
}
