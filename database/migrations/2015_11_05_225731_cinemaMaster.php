<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CinemaMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('ciudad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->timestamps();
        });

        Schema::create('localidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('teatro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',55);
            $table->string('direccion',65);
            $table->text('descripcion');
            $table->string('imagen',45);
            $table->integer('ciudad_id')->unsigned();
            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->timestamps();
        });

        Schema::create('sala', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',55);
            $table->integer('')->unsigned();
            $table->integer('ciudad_id')->unsigned();
            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->timestamps();
        });


        Schema::create('pelicula', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('imagen',45);
            $table->text('descripcion');
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
        Schema::drop('pais');
        Schema::drop('ciudad');
    }
}
