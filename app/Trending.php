<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Trending extends Model
{
    protected $table = "trending";

    protected $fillable = [
        'empresa',
        'producto',
        'categoria',
        'user_id'
    ];
}
