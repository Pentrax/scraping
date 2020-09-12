<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusquedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busquedas', function (Blueprint $table) {
            $table->id();
            $table->float("precio");
            $table->string("contenido");
            $table->string("titulo");
            $table->string("src");
            $table->string("href");
            $table->string("brand");
            $table->string("empresa");
            $table->string("busqueda");
            $table->integer("cantidad_busquedas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
