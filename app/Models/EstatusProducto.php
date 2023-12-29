<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusProducto extends Model
{
    use HasFactory;

    protected $table= 'estatus_producto';
    

    public function producto(){
        return $this->hasMany(Producto::class, 'estatus_producto_id');
    }

}
