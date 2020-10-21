<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = "comentarios";

    protected $fillable = [
        "producto_id",
        "titulo",
        "comentario",
        "valoracion",
        "user_id"
    ];

}
