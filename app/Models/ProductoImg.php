<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImg extends Model
{
    use HasFactory;

    protected $table = 'producto_img';

    protected $fillable= ['producto_id','url','archivo'];


    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    
}
