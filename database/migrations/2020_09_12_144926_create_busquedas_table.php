<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusquedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('busquedas', function (Blueprint $table) {
            $table->increments("id");
            $table->float("precio");
            $table->string("contenido");
            $table->string("titulo");
            $table->string("src");
            $table->string("href");
            $table->string("brand")->type("LONGTEXT");
            $table->string("empresa");
            $table->string("busqueda");
            $table->string("marca")->nullable();
            $table->integer("cantidad_busquedas");
            $table->integer('user_id')->unsigned()->nullable();
            $table->string("categoria")->nullable();
           // $table->foreign("user_id")->references('id')->on('users');
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
        Schema::dropIfExists('busquedas');
    }
}
