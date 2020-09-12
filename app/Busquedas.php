<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busquedas extends Model
{
    protected $fillable = [
        'precio',
        'contenido',
        'titulo',
        'src',
        'href',
        'brand',
        'empresa',
        'busqueda'
    ];
}
