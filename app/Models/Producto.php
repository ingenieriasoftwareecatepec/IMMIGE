<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table= 'productos';

    protected $fillable= ['nombre','descripcion','marca','estatus_producto_id', 'negocio_id'];

    public function estatus(){
        return $this->belongsTo(EstatusProducto::class, 'estatus_producto_id');
    }

    public function negocio(){
        return $this->belongsTo(Negocio::class, 'negocio_id');
    }

    public function imagenes(){
        return $this->hasMany(ProductoImg::class, 'producto_id');
    }
}
