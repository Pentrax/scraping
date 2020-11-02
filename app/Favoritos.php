<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $table = "favoritos";

    protected $fillable = [
        'busqueda_id',
        'usuario_id'
    ];
}
