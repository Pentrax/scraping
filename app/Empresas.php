<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = "empresa";
    protected $fillable = [
        "empresa",
        "rubro"
    ];
}
