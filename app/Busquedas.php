<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busquedas extends Model
{
    protected $table = "busquedas";

    protected $fillable = [
        'precio',
        'contenido',
        'titulo',
        'src',
        'href',
        'brand',
        'empresa',
        'busqueda',
        'categoria',
        'marca'
    ];

    public function userId(){
        return $this->belongsTo("App\Models\User");
    }
}
